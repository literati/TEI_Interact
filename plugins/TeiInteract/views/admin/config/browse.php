<?php
head(array('title' => 'TEI Interact Configuration', 'bodyclass' => 'primary', 'content_class' => 'horizontal-nav'));
?>
<h1>TEI Interact</h1>

<div id="primary">
    <?php echo flash(); ?>
    <?php
    if (!empty($err)) {
        echo '<p class="error">' . html_escape($err) . '</p>';
    }
    ?>
    <?php // print_r(get_defined_vars()); ?>




    <?php if (!$records) { ?>
        <h2>No Files found on the system!</h2>
    <?php } else { ?>
        <h2>TEI files</h2>
        <ul>
            <?php foreach ($records as $file): ?>
                <li>


                    <?php
//                    sort($tags, SORT_STRING);
                    $item = item('Dublin Core', 'Title', $options, $file->getItem());
                    $web = $file->getWebPath('archive');
                    $file_id = $file->id;
//                    print_r($file);
                    debug('file id = ' . $file_id);
                    echo "<strong>" . $item . "</strong> - ".$file->original_filename."<br/>";
                    echo "<a href=\"" . $web . "\">View in Browser</a>";
                    echo " <a href=\"" . html_escape(uri('tei-interact/list/inspect', array('id' => $file_id))) . "\" class=\"inspect\">Inspect TEI Tags</a>";
                    ?>

                </li>

    <?php endforeach; ?>
        </ul>
        <?php } ?>
    <?php
    foot();
    ?>