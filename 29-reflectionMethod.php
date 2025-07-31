<?php
// ==============================
// PHP LESSON: ReflectionMethod
// ==============================

// ----------------------
// 🧠 DEFINITION:
// ----------------------
// ReflectionMethod is a built-in PHP class that provides information
// about a class method and allows you to manipulate or invoke it dynamically.

// ----------------------
// 🧰 USEFUL FOR:
// ----------------------
// ✔ Inspecting method properties (visibility, name, parameters, etc.)
// ✔ Dynamically calling methods (even private/protected ones)
// ✔ Used in frameworks (like Laravel, Symfony) for routing, dependency injection, etc.
//using ReflectionMethod, you can gain insights into class methods and invoke them without needing to know their details at compile time.

// ----------------------
// 📝 EXAMPLE:
// ----------------------   

// This class simulates a student class with a public method and a private method.
class Student {
    public function greet($name) {
        return "Hello, $name!";
    }

    private function secretNote($text) {
        return "Private note: $text";
    }
}

// ----------------------------------------
// 1. INSPECTING A PUBLIC METHOD
// ----------------------------------------

// Create a ReflectionMethod instance for the public 'greet' method
$method = new ReflectionMethod('Student', 'greet');

// Output the method's name
echo "Method Name: " . $method->getName() . PHP_EOL; // greet

// Check and output if the method is public
echo "Is Public? " . ($method->isPublic() ? 'Yes' : 'No') . PHP_EOL; // Yes

// Output the class where the method is declared
echo "Declared in: " . $method->getDeclaringClass()->getName() . PHP_EOL; // Student

// Get and output all parameters of the method
$params = $method->getParameters();
foreach ($params as $param) {
    echo "Parameter: " . $param->getName() . PHP_EOL; // name
}

// ----------------------------------------
// 2. INVOKING A PUBLIC METHOD DYNAMICALLY
// ----------------------------------------

// Create an instance of the Student class
$student = new Student();

// Use the ReflectionMethod to invoke the 'greet' method with the parameter 'Alice'
$result = $method->invoke($student, 'Alice');

// Output the result of the method call
echo "Invoked Result: " . $result . PHP_EOL; // Hello, Alice!

// ----------------------------------------
// 3. INVOKING A PRIVATE METHOD
// ----------------------------------------

// Create a ReflectionMethod instance for the private 'secretNote' method
$privateMethod = new ReflectionMethod('Student', 'secretNote');

// Allow access to the private method
$privateMethod->setAccessible(true);

// Invoke the private method with a string parameter
$privateResult = $privateMethod->invoke($student, 'Bring your book tomorrow.');

// Output the result of the private method
echo "Private Method Result: " . $privateResult . PHP_EOL; // Private note: Bring your book tomorrow.

?>
