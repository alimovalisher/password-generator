This library helps to generate a password
=====================

This is a simple library for generating passwords

1. Register password generators
2. Switch password generator type
3. Generate password with different length


Example
-------

How initialize password generator?
-------
At first we must register available generators
~~~~~ php
PasswordGenerator::get()
                        ->registerGenerator(new Low())
                        ->registerGenerator(new Medium())
                        ->registerGenerator(new Strong());
~~~~~

How to generate password?
------

~~~~~ php

// Switch generator and let generate passwords
PasswordGenerator::get()->switchGenerator(Low::getName());
PasswordGenerator::get()->generate(1);
PasswordGenerator::get()->generate(10);

// OR
PasswordGenerator::get()->switchGenerator(Low::getName())->generate(1);


// Switching to another generator

PasswordGenerator::get()->switchGenerator(Medium::getName())->generate(10);
PasswordGenerator::get()->switchGenerator(Strong::getName())->generate(15);
~~~~~
