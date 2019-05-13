<form method="POST" enctype="multipart/form-data">
    <?php foreach ($view['fields'] as $field_id => $field): ?>
        <label>
            <span><?php print $field['label']; ?></span>

            <!-- Form field -->            
            <?php if (in_array($field['type'], ['text', 'password', 'file'])): ?>
                <!-- Simple input field: text, password -->
                <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>"/>
            <?php elseif ($field['type'] == 'float'): ?>
                <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>" step="0.01"/>
            <?php elseif ($field['type'] == 'number'): ?>
                <?php if (isset($field['min']) && isset($field['max'])): ?>
                    <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>" min="<?php print $field['min']; ?>" max="<?php print $field['max']; ?>"/>
                <?php else: ?>
                    <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>"/>
                <?php endif; ?>
            <?php elseif ($field['type'] == 'select'): ?>
                <!-- Select field -->
                <select name="<?php print $field_id; ?>">
                    <?php foreach ($field['options'] as $option_id => $option_label): ?>
                        <option value="<?php print $option_id; ?>"><?php print $option_label; ?></option>
                    <?php endforeach; ?>
                </select>
            <?php elseif ($field['type'] == 'radio'): ?>
                <!-- Radio field -->
                <div class="input-radio-container">
                    <?php foreach ($field['values'] as $value): ?>
                        <label>
                            <input name="<?php print $field_id; ?>" type="<?php print $field['type']; ?>" value="<?php print $value; ?>">
                            <img src="<?php print $field['img'][$value]; ?>">
                        </label>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <!-- Errors -->
            <?php if (isset($field['error_msg'])): ?>
                <p class="error"><?php print $field['error_msg']; ?></p>
            <?php endif; ?>
        </label>
    <?php endforeach; ?>

    <?php if (isset($view['error_msg'])): ?>
        <p class="error"><?php print $view['error_msg']; ?></p>
    <?php endif; ?>

    <!-- Buttons -->
    <?php foreach ($view['buttons'] as $button_id => $button): ?>
        <button name="action" value="<?php print $button_id; ?>">
            <?php print $button['text']; ?>
        </button>
    <?php endforeach; ?>
</form>