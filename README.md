# Better Arrays
This is a project of spite. It originated when I was tasked with fixing a reporting screen in a web application. The previous developer had done some gnarly repetitive database queries. As the application grew, this page got slower and slower until it started timing out. I knew I could get the data I needed in one query, but I would need to do some significant data reducing and mapping to get it to a state where it would fit into the expected charts and graphs.

Php has an amazing set of array methods; check them out if you haven't: https://www.php.net/manual/en/ref.array.php. As someone coming from ES6 JavaScript however, this appears to be a bit overwhelming. In ES6, most array handling can be done with "the big three": `map`, `filter`, `reduce`. Not only that, but you can chain the methods and make beautiful ropey array parsing chains.

```$javascript
let arrayOfObjects = array
    .filter(x => x.children.length > 0)
    .reduce((accumulator, x) => {
        let children = x.children.map(child => ({parent: x.name, ...child}))
        return accumulator.concat(children)
    }, [])
    .map(x => new CoolObject(x))
    
```
In php you might find a method that fits your exact needs, there are 81 methods in that list. However, methods have different signatures, some are editing the array in place, and most importantly, they don't chain.

So in php you might have to do something like this:
```$php
$filtered = array_filter($array, function($x) { return count($x.children) > 0});
$reduced = array_reduce($filtered, function($x) {
    $children = array_map(function($child) { return ["parent" => $child.name, etc, etc ]}, $x);
    
}, []);
$mapped = array_map(function($x) { return new CoolObject($x); }, $reduced);
```
You can see I lost interest about halfway through writing that. Also, notice how the method signature of `array_map` flips from `array_reduce` and `array_filter`. 

I will admit the php array methods are powerful, but I assert they are overpowered, and as a result, hard to read, hard to write, and generally not user friendly.

I'm eliding one of php major features, keyed arrays. Some methods are included here, but we miss some of the functionality because of the one return policy.

In `Better Arrays` my goal is to make array handling chainable, easy to read, and easy to  write. Most important to me are `map`, `filter`, and `reduce`, but there are too many juicy methods, so I included them where it makes sense. Because of the requirement this be chainable, I'm excluding any methods that modify the array in place.

Try it today, have a `BetterArray`.

```$php
$arrayOfObjects = new BetterArray($array)
    .filter(function($x) { return count($x.children) > 0;})
    .reduce(function($acc, $x) {
        return array_merge($acc, $x.children);
    }, [])
    .map(function($x) { return new CoolObject($x);})
    .returnArray();
```

## Usage

If it's not obvious, this is a very personal project, and I haven't landed on a prefered implementation method yet, so I've inlcuded them all.

```$php
// Object instantiation
$arr = new BetterArray($array);

// Static method
$arr = BetterArray::funcify($array);

// Function wrapper
$arr = betterArray($array);
```
The BetterArray holding your array returns itself until you use one of the `return` methods. The primary one is `returnArray`, which returns the array in it's last state.
