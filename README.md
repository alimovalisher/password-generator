This library helps to generate a password
=====================

This is a simple library for generating passwords

1. You can set the difficulty of the generated password
2. Allows you to choose the length of the password

Example
-------

~~~~~ php
PasswordGenerator::get()->low()->generate(3);      // generate low strength password
PasswordGenerator::get()->medium()->generate(10);  // generate meduim strength password
PasswordGenerator::get()->strong()->generate(15);  // generate high strength password
~~~~~
