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

<?= $this->render_partial('feedback', array('messages' => $flash['messages'])) ?>

<?
Helpbar::get ()->addPlainText ('', _("Geben sie eine Liste von Nutzernamen (username) ein, an die eine Nachricht verschickt werden soll. Die Namen k�nnen mit Komma, Semikolon, oder whitespaces getrennt sein. Alternativ k�nnen Sie sich auch hier (zus�tzlich) eine bestimmte Rechtegruppe ausw�hlen, an die eine Nachricht verschickt werden soll, sowie Empf�nger anhand einer bestimmten Studieninformation."));
?>
<h1><?=_("Massennachrichten")?></h1>
<form action="<?= PluginEngine::getLink('multimess/admin/addressee_lookup/') ?>" method=post>
    <div style="margin:0 auto;">
    <div class="mmleft">
        <label for="cand_addressee">
            <?=_("Empf�nger:")?>
        </label></br></br></br>
        <div>
            <textarea id="cand_addressee" name="cand_addressee" rows="20" cols="40" wrap="virtual">
                <?=(is_array($addressee_list) ? join("\n", array_keys($addressee_list)): '')?>
            </textarea>
        </div>
    </div>
    <div class="mmright">
        <input type="checkbox" name="perms[]" value="admin"> Administratoren<br>
        <input type="checkbox" name="perms[]" value="dozent"> Dozenten<br>
        <input type="checkbox" name="dozent_aktiv" value="dozent_aktiv"> aktive Dozenten<br>
        <input type="checkbox" name="perms[]" value="tutor"> Tutoren<br>
        <br>
        <div>
            <span style="vertical-align:top;padding-right:15px;">Studiengang:</span><br>
            <select name="studiengang[]" class="mmselect" size="5" multiple>
            <? foreach($studycourses as $sg) : ?>
                <option value="<?=$sg['studiengang_id']?>"><?=$sg['name']?></option>
            <? endforeach ?>
            </select>
            <br><br>
            <span style="vertical-align:top;padding-right:15px;">Abschluss:</span><br>
            <select name="abschluss[]" class="mmselect" size="5" multiple>
            <? foreach($studydegrees as $abs) : ?>
                <option value="<?=$abs['abschluss_id']?>"><?=$abs['name']?></option>
            <? endforeach ?>
            </select>
        </div>
            <!-- ><br>
            Empf�nger anhand bestimmter Studieninfos hinzuf�gen:<br>
            <input type="text" name="datafield"  size="40" value=""><br><br>
            <input type="checkbox" name="locked" value="TRUE"> nur an nicht gesperrte Nutzer<br>
            <!-- <input type="checkbox" name="perms[]" value="autor"> Autoren<br> -->
    </div>
    <div style="clear:both"></div>
    </div>
    <br>
    <div class="mmform_submit">
        <!-- <div class="button-group"> -->
            <?//= \Studip\LinkButton::createCancel(_('Abbrechen'), PluginEngine::getLink('multimess/admin/')) ?>
            <?= \Studip\Button::create(_('Suchen'), 'suchen') ?>
        <!-- </div> -->
    </div>
</form> 