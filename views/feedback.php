<?
    /*
     * Copyright (C) 2012 - Andr� Kla�en <andre.klassen@elan-ev.de>
     *
     * This program is free software; you can redistribute it and/or
     * modify it under the terms of the GNU General Public License as
     * published by the Free Software Foundation; either version 2 of
     * the License, or (at your option) any later version.
     */
?>

<? if (!empty($messages)): ?>
    <? foreach ($messages as $type => $message): ?>
        <?= MessageBox::$type($message) ?>
    <? endforeach ?>
<? endif; ?>