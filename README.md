# Better Arrays
This is a project of spite. It originated when I was tasked with fixing a reporting screen in a web application. The previous developer had done some gnarly repetitive database queries. As the application grew, this page got slower and slower until it started timing out. I knew I could get the data I needed in one query, but I would need to do some significant data reducing and mapping to get it to a state where it would fit into the expected charts and graphs.

Php has an amazing set of array methods; check them out if you haven't: https://www.php.net/manual/en/ref.array.php. As someone coming from ES6 JavaScript however, this appears to be a bit much. In ES6, array handling can be done with "the big three": `map`, `filter`, `reduce`. Not only that, but you can chain the methods and make beautiful array parsing ropes.

```$javascript
let arrayOfObjects = array
    .filter(x => x.children.length > 0)
    .reduce((accumulator, x) => {
        let children = x.children.map(child => ({parent: x.name, ...child}))
        return accumulator.concat(children)
    }, [])
    .map(x => new CoolObject(x))
    
```
In php you might find a method that fits your exact needs, there are 81 methods in that list. However, each method has a different signature, some are editing the array in place, and most importantly, they don't chain.

So in php you might have to do something like this:
```$php
$filtered = array_filter($array, function($x) { return count($x.children) > 0});
$reduced = array_reduce($filtered, function($x) {
    $children = array_map(function($child) { return ["parent" => $child.name, etc, etc ]}, $x);
    
}, []);
$mapped = array_map(function($x) { return new CoolObject($x); }, $reduced);
```
You can see I lost interest about halfway through writing that. Also, notice how the method signature of `array_map` flips from `array_reduce` and `array_filter`. 

I will admit the php array methods are powerful, but I assert they are overpowered, and as a result, hard to read, hard to write, and just generally not user friendly.

I'm also eliding one of php major features, keyed arrays. The methods are included here, we miss some of the functionality because of the one return policy.

In `Better Arrays` my goal is to complex array handling chainable, easy to read and write. I would assert you can get 99% of the code written with just `map`, `filter`, and `reduce`, but there are too many juicy methods availble to leave it at that. Because of the requirement this be chainable, I'm excluding any methods that modify the array in place.

Try it today:

```$php
$arrayOfObjects = new BetterArray($array)
    .filter(function($x) { return count($x.children) > 0;})
    .reduce(function($acc, $x) {
        return array_merge($acc, $x.children);
    }, [])
    .map(function($x) { return new CoolObject($x);});
```

