# php_unit

## run phpunit from terminal

* set alias in .bashrc or .zshrc 
  
  ```alias phpunit="./vendor/phpunit/phpunit/phpunit"```
* run a single test methode inside a test class

  ``` phpunit tests/Usertest --filter=testReturnsFullName```
  
* run all methods in a test class 
  
  ``` phpunit tests/ExampleTest.php```

* run all test methods in all test classes in the tests folder
  
  ``` phpunit tests```

* with the color flag you can create a colored output in your test result 

  ``` phpunit tests --color```

