# Please don't swear

A simple package that allows you to easily censor text.

For now, it only supports Polish "bad words" and allows basic censorship of the text, but in the future I plan to add support for other languages, as well as more methods to work with censored text.

# Installation

Use composer to install PleaseDontSwear into your project:

```
composer require deoomen/please-dont-swear
```

# How to use

```php
<?php

use PleaseDontSwear\PleaseDontSwear;

// ...

$PDS = new PleaseDontSwear();
$myCensoredText = $PDS->censor($myBadText);
```

More examples of using methods can be found in the [examples](https://github.com/deoomen/please-dont-swear/tree/master/examples) folder.

# Tests

TODO

# License

[MIT License](https://github.com/deoomen/please-dont-swear/blob/master/LICENSE)
