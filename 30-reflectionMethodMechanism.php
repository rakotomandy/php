<?php
// Example class with two methods
class Demo {
    public function sayHello() {
        echo "Hello, ReflectionMethod!\n";
    }

    public function greet($name) {
        echo "Greetings, $name!\n";
    }
}

// The class and method names we want to call dynamically
$class = 'Demo';
$method = 'sayHello';

echo "=== Using Reflection ===\n";
// Using ReflectionMethod to create a reflection of the method
$reflection = new ReflectionMethod($class, $method);

// Invoke the method on a new instance of the class (no parameters)
$reflection->invoke(new $class);

echo "\n=== Without Reflection (Direct Call) ===\n";
// Instantiate the class dynamically
$instance = new $class;

// Call the method directly on the instance
$instance->$method();

echo "\n\n=== Using Reflection with Parameters ===\n";
$methodWithParams = 'greet';
// Create a ReflectionMethod for the method that accepts parameters
$reflection2 = new ReflectionMethod($class, $methodWithParams);

// Invoke the method with parameters on a new instance
$reflection2->invokeArgs(new $class, ['Alice']);

echo "\n=== Without Reflection with Parameters ===\n";
// Instantiate the class dynamically (reuse $instance or create new)
$instance2 = new $class;

// Call the method with parameters directly
$instance2->$methodWithParams('Alice');

/*
Side-by-side explanation:

Using Reflection                               | Without Reflection (Direct Call)
-----------------------------------------------|---------------------------------------
$reflection = new ReflectionMethod($class, $method); | $instance = new $class;
$reflection->invoke(new $class);                | $instance->$method();
$reflection->invokeArgs(new $class, ['param']); | $instance->$method('param');
*/
?>
