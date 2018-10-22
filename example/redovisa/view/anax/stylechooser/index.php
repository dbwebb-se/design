<?php

namespace Anax\View;

/**
 * Style chooser.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><h1>Stylechooser</h1>
<p>Here you can select among the available styles and activate them.</p>
<form class="stylechooser" method="post" action="<?= url("style/update") ?>">
    <fieldset>
        <legend>Stylechooser</legend>
        <p>
            <label for="stylechooser">Select the style to activate it:<br>
                <select name="stylechooser" onchange="form.submit();">
                    <option value="none">No style is selected, using default.</option>
                    <?php foreach ($styles as $key => $value) :
                        $selected = $key === $activeStyle ? "selected=\"selected\"" : null;
                        ?>
                        <option <?= $selected ?> value="<?= $key ?>"><?= "[ $key ] - {$value["shortDescription"]}" ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </p>
        <?php if ($activeStyle) : ?>
            <p>Here follows details on the current selected style.</p>
            <table>
                <tr>
                    <th>Filename:</th>
                    <td><code><?= $activeStyle ?></code></td>
                </tr>
                <tr>
                    <th>Short description:</th>
                    <td><?= $activeShortDescription ?></td>
                </tr>
                <tr>
                    <th>Long description:</th>
                    <td><?= $activeLongDescription ?></td>
                </tr>
            </table>
        <?php endif; ?>
    </fieldset>
</form>
