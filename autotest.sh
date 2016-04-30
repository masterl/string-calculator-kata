#!/bin/bash
while true; do
find `pwd` |
    grep -v "/.git/" |
    grep -v "/vendor/" |
    grep -E "[.]php$" |
    entr -d sh -c "tput reset; vendor/bin/phpunit --bootstrap vendor/autoload.php tests/CalculatorTest;echo;date"
done
