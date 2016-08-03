*********************
MIME_Type_PlainDetect
*********************
Detect the MIME type of source code files.

A self-made MIME magic file to detect if a source code file is
CSS, rST or SQL.


====================
Supported file types
====================
- css
- diff
- htm
- ini
- js
- php
- rst (reStructuredText)
- sh
- sql
- svg
- ts (TypoScript)
- txt
- xml


=====
Usage
=====

Command line
============
Download ``data/programming.magic`` and then::

    $ file -m programming.magic /path/to/file.css
    text/css


PHP
===
See ``examples/mimedetect.php``::


    require_once 'MIME/Type/PlainDetect.php';
    $type = MIME_Type_PlainDetect::autoDetect($file);
    if ($type == 'text/plain') {
        //do something
    }


Installation
============

PEAR
====
::

   $ pear channel-discover zustellzentrum.cweiske.de
   $ pear install zz/mime_type_plaindetect-alpha

Composer
========
::

   $ composer require cweiske/mime_type_plaindetect


===========================
About MIME_Type_PlainDetect
===========================

License
=======
MIME_Type_PlainDetect is licensed under the `OSL 3.0`__.

__ http://opensource.org/licenses/osl-3.0


Coding style
============
MIME_Type_PlainDetect follows the `PEAR Coding Standards`__.

__ http://pear.php.net/manual/en/standards.php


Author
======
Written by `Christian Weiske <http://cweiske.de/>`_.
