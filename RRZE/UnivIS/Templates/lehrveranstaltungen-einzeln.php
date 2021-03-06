<?php if ($daten['veranstaltung']) :
    $veranstaltung = $daten['veranstaltung'];
    ?>
    <h2><?php echo $veranstaltung['name']; ?></h2>

    <?php if (array_key_exists('dozs', $veranstaltung) && array_key_exists('doz', $veranstaltung['dozs'][0])) : ?>
        <h3><?php _e('Lecturers', 'rrze-univis');?></h3>
        <ul>
        <?php
        foreach ($veranstaltung['dozs'][0]['doz'] as $doz) :
            $name = array();
            if (!empty($doz['title'])) :
                $name['title'] = '<span itemprop="honorificPrefix">' . $doz['title'] . '</span>';
            endif;
            if (!empty($doz['firstname'])) :
                $name['firstname'] = '<span itemprop="givenName">' . $doz['firstname'] . '</span>';
            endif;
            if (!empty($doz['lastname'])) :
                $name['lastname'] = '<span itemprop="familyName">' . $doz['lastname'] . '</span>';
            endif;
            $fullname = implode(' ', $name);
            if (!empty($doz['id'])):
                $url = '<a href="' . get_permalink() . 'univisid/' . $doz['id'] . '">' . $fullname . '</a>';
            else:
                $url = $fullname;
            endif;?>
            <li itemprop="name" itemscope itemtype="http://schema.org/Person"><?php echo $url; ?></li>
            <?php
        endforeach; ?>
        </ul>
    <?php endif; ?>

    <h3><?php _e('Details', 'rrze-univis');?></h3>

    <?php if (!empty($veranstaltung['angaben'])): ?>
        <p><?php echo $veranstaltung['angaben']; ?></p>
    <?php endif; ?>

    <h4><?php _e('Time and place', 'rrze-univis');?>:</h4>
            <?php if (array_key_exists('comment', $veranstaltung)) : ?>
            <p><?php echo $veranstaltung['comment']; ?></p>
            <?php endif; ?>
    <ul>
        <?php if (array_key_exists('course_terms', $veranstaltung)) :
            foreach ($veranstaltung['course_terms'] as $course_terms):
                $t = array();
                $time = array();
                if (!empty($course_terms['date'])) :
                    $t['date'] = $course_terms['date'];
                endif;
                if (!empty($course_terms['starttime'])) :
                    $time['starttime'] = $course_terms['starttime'];
                endif;
                if (!empty($course_terms['endtime'])) :
                    $time['endtime'] = $course_terms['endtime'];
                endif;
                if (!empty($time)) :
                    $t['time'] = $time['starttime'] . '-' . $time['endtime'];
                else:
                    $t['time'] = __('Time on appointment', 'rrze-univis');
                endif;
                if (!empty($course_terms['room_short'])) :
                    if (!empty($t['time'])) :
                        $t['time'] .= ',';
                    elseif (!empty($t['date'])) :
                        $t['date'] .= ',';
                    endif;
                    $t['room_short'] = __('Room', 'rrze-univis') . ' ' . $course_terms['room_short'];
                endif;
                if (!empty($course_terms['exclude'])) :
                    $t['exclude'] = '(' . __('exclude', 'rrze-univis') . ' ' . $course_terms['exclude'] . ')';
                endif;
                // Kursname
                if (!empty($course_terms['coursename'])) :
                    $t['coursename'] = '(' . __('Course', 'rrze-univis') . ' ' . $course_terms['coursename'] . ')';
                endif;
                $term_formatted = implode(' ', $t);
                ?>
                <li><?php echo $term_formatted; ?></li>
            <?php endforeach;
        elseif (array_key_exists('terms', $veranstaltung) && array_key_exists('term', $veranstaltung['terms'][0])) :
            foreach ($veranstaltung['terms'][0]['term'] as $term) :
                $t = array();
                $time = array();
                if (!empty($term['date'])) :
                    $t['date'] = $term['date'];
                endif;
                if (!empty($term['starttime'])) :
                    $time['starttime'] = $term['starttime'];
                endif;
                if (!empty($term['endtime'])) :
                    $time['endtime'] = $term['endtime'];
                endif;
                if (!empty($time)) :
                    $t['time'] = $time['starttime'] . '-' . $time['endtime'];
                else:
                    $t['time'] = __('Time on appointment', 'rrze-univis');
                endif;
                if (!empty($term['room_short'])) :
                    if (!empty($t['time'])) :
                        $t['time'] .= ',';
                    elseif (!empty($t['date'])) :
                        $t['date'] .= ',';
                    endif;
                    $t['room_short'] = __('Room', 'rrze-univis') . ' ' . $term['room_short'];
                endif;
                if (!empty($term['exclude'])) :
                    $t['exclude'] = '(' . __('exclude', 'rrze-univis') . ' ' . $term['exclude'] . ')';
                endif;
                $term_formatted = implode(' ', $t);?>
                <li><?php echo $term_formatted; ?></li>
            <?php endforeach;
        else : ?>
            <li><?php _e('Time and place on appointment', 'rrze-univis'); ?></li>
        <?php endif; ?>
    </ul>


    <?php if (array_key_exists('studs', $veranstaltung) && array_key_exists('stud', $veranstaltung['studs'][0])) : ?>
    <h4><?php _e('Fields of study', 'rrze-univis');?></h4>
    <ul>
        <?php
        foreach ($veranstaltung['studs'][0]['stud'] as $stud) :
            $s = array();
            if (!empty($stud['pflicht'])) :
                $s['pflicht'] = $stud['pflicht'];
            endif;
            if (!empty($stud['richt'])) :
                $s['richt'] = $stud['richt'];
            endif;
            if (!empty($stud['sem'][0]) && absint($stud['sem'][0])) :
                $s['sem'] = sprintf('%s %d', __('from SEM', 'rrze-univis'), absint($stud['sem'][0]));
            endif;
            $studinfo = implode(' ', $s);
            ?>
            <li><?php echo $studinfo; ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>


    <?php if (!empty($veranstaltung['organizational'])) : ?>
        <h4><?php _e('Prerequisites / Organizational information', 'rrze-univis');?></h4>
        <p><?php echo $veranstaltung['organizational']; ?></p>
        <?php endif;
    ?>


    <?php if (!empty($veranstaltung['summary'])) : ?>
        <h4><?php _e('Content', 'rrze-univis');?></h4>
        <p><?php echo $veranstaltung['summary']; ?></p>
    <?php endif; ?>


    <?php if (!empty($veranstaltung['literature'])) : ?>
        <h4><?php _e('Recommended Literature', 'rrze-univis');?></h4>
        <p><?php echo $veranstaltung['literature']; ?></p>
    <?php endif; ?>

    <?php if (!empty($veranstaltung['ects_infos'])) : ?>
        <h4><?php _e('ECTS information', 'rrze-univis');?></h4>
        <?php if (!empty($veranstaltung['ects_name'])) : ?>
            <h5><?php _e('Title', 'rrze-univis');?></h5>
            <p><?php echo $veranstaltung['ects_name']; ?></p>
        <?php endif; ?>
        <?php if (!empty($veranstaltung['ects_cred'])) : ?>
            <h5><?php _e('Credits', 'rrze-univis');?></h5>
            <p><?php echo $veranstaltung['ects_cred']; ?></p>
        <?php endif; ?>
        <?php if (!empty($veranstaltung['ects_summary'])) : ?>
            <h5><?php _e('Content', 'rrze-univis');?>:</h5>
            <p><?php echo $veranstaltung['ects_summary']; ?></p>
        <?php endif; ?>
        <?php if (!empty($veranstaltung['ects_literature'])) : ?>
            <h5><?php _e('Literature', 'rrze-univis');?>:</h5>
            <p><?php echo $veranstaltung['ects_literature']; ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($veranstaltung['zusatzinfos'])) : ?>
        <h4><?php _e('Additional information', 'rrze-univis');?></h4>
        <?php if (!empty($veranstaltung['keywords'])) : ?>
            <p><?php _e('Keywords', 'rrze-univis');?>: <?php echo $veranstaltung['keywords']; ?></p>
        <?php endif; ?>
        <?php if (!empty($veranstaltung['turnout'])) : ?>
            <p><?php _e('Expected participants', 'rrze-univis');?>: <?php echo $veranstaltung['turnout']; ?></p>
        <?php endif; ?>
        <?php if (!empty($veranstaltung['url_description'])) : ?>
            <p>www: <a href="<?php echo $veranstaltung['url_description']; ?>"><?php echo $veranstaltung['url_description']; ?></a></p>
        <?php endif; ?>
    <?php endif;
endif;
