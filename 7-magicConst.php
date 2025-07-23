<?php
// LESSON TITLE: PHP Magic Constants (__CONSTANT__)
// Description: Magic constants are predefined constants in PHP that change depending on their usage context.

// 1. __LINE__
// Description: Returns the current line number of the file.
echo "__LINE__: ";
echo __LINE__; // Output: (This line's number, e.g., 10)
echo "\n";

// 2. __FILE__
// Description: Returns the full path and filename of the current file.
echo "__FILE__: ";
echo __FILE__; // Output: /full/path/to/this_file.php
echo "\n";

// 3. __DIR__
// Description: Returns the directory of the file.
echo "__DIR__: ";
echo __DIR__; // Output: /full/path/to
echo "\n";

// 4. __FUNCTION__
// Description: Returns the function name inside a function context.
function sampleFunction() {
    echo "__FUNCTION__: ";
    echo __FUNCTION__; // Output: sampleFunction
    echo "\n";
}
sampleFunction();

// 5. __CLASS__
// Description: Returns the class name inside class context.
class SampleClass {
    public function showClass() {
        echo "__CLASS__: ";
        echo __CLASS__; // Output: SampleClass
        echo "\n";
    }
}
$obj = new SampleClass();
$obj->showClass();

// 6. __TRAIT__
// Description: Returns the trait name inside trait context.
trait ExampleTrait {
    public function showTrait() {
        echo "__TRAIT__: ";
        echo __TRAIT__; // Output: ExampleTrait
        echo "\n";
    }
}
class UseTrait {
    use ExampleTrait;
}
$t = new UseTrait();
$t->showTrait();

// 7. __METHOD__
// Description: Returns the class method name.
class MethodExample {
    public function someMethod() {
        echo "__METHOD__: ";
        echo __METHOD__; // Output: MethodExample::someMethod
        echo "\n";
    }
}
$m = new MethodExample();
$m->someMethod();

// 8. __NAMESPACE__
// Description: Returns the name of the current namespace.
namespace MyNamespace {
    echo "__NAMESPACE__: ";
    echo __NAMESPACE__; // Output: MyNamespace
    echo "\n";
}
?>
