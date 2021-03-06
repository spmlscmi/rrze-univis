<?php if ($daten['veranstaltungen']) :
    foreach ($daten['veranstaltungen'] as $veranstaltung) : 
        if($this->optionen['lv_type'] == 1) : ?>
	<h2>
            <?php echo $veranstaltung['title']; ?>
        </h2>
        <?php endif; ?>
	<ul>
        <?php if (!empty($veranstaltung['data'])) : 
            foreach ($veranstaltung['data'] as $data) : 
            if( empty( $this->optionen['leclanguage'] ) || ( isset( $data['leclanguage'] ) && strpbrk( $data['leclanguage'], $this->optionen['leclanguage'] ) != FALSE  ) )  :
                if ( !isset ($data['parent_course_id']) ): 
                $url = get_permalink() . 'lv_id/' . $data['id'];
                if (!empty($daten['optionen']['sem'])) :
                    $url .= '&sem=' . $daten['optionen']['sem']; 
                endif; ?>
                <li>
                    <h3><a href="<?php echo $url; ?>"><?php echo $data['name']; ?></a></h3>
                    <?php if( $this->optionen['kompakt'] == 0 ):
                    if (array_key_exists('comment', $data)) : ?>
                        <p><?php echo $data['comment']; ?></p>
                    <?php endif; ?>
                    <ul>
                        <?php
                        if (array_key_exists('course_terms', $data)) :
                            foreach ($data['course_terms'] as $course_terms):
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
                                $term_formatted = implode(' ', $t);
                                ?>    
                                <li><?php echo $term_formatted; ?></li>
                            <?php
                            endforeach;
                        elseif (array_key_exists('terms', $data) && array_key_exists('term', $data['terms'][0])) :
                            foreach ($data['terms'][0]['term'] as $term) :
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
                                $term_formatted = implode(' ', $t);
                                ?>    
                                <li><?php echo $term_formatted; ?></li>
                            <?php  endforeach;
                        else : ?>
                                <li><?php _e('Time and place on appointment', 'rrze-univis');?></li>
                        <?php endif; ?>
                        </ul>

                </li>
                <?php endif;
                endif;
                endif;
            endforeach;
        endif; ?>

                
	</ul>
    <?php 
    endforeach;
                
endif;
