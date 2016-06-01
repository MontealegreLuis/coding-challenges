# Coding challenges April 2016

The solutions to the challenges can be run with the following commands:

```bash
$ php 1.php 1 100
$ php 2.php 328
$ php 3.php 46114
$ php 4.php 155
$ php 5.php 1,2,5,10,20,40
$ php 5.php 1,2,3,4,5,6
```

These are improved solutions to the original implementations. If you want to
check the original result. Checkout the `original` tag.

```bash
$ git checkout original
```

## Tests

I created some unit tests for the improved solution to challenge 3. You can run
those tests with the following commands:

```bash
$ composer install
$ bin/phpunit --testdox
```
