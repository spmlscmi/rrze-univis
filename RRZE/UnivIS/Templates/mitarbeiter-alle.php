<div id="univis-personenindex">
    <?php foreach ($daten['gruppen'] as $gruppe) : 
        if ( (empty( $daten['optionen']['zeige_jobs']) || in_array($gruppe['name'], $daten['optionen']['zeige_jobs']) ) && !empty( $gruppe['personen'] ) ) : ?>
    <h4><?php echo $gruppe['name']; ?></h4>
    <ul class="person liste-person" itemscope itemtype="http://schema.org/Person">
        <?php foreach ($gruppe['personen'] as $person) : 
            $name = array(); 
            $p = array();
            $pers = array();
            $lastname = ''; 
            $firstname = ''; 
            $fullname = '';
            $out = '';
            ?>
            <li>                
                    <?php 
                    if (!empty($person['title'])) : 
                        $name['title'] = '<span itemprop="honorificPrefix"><acronym title="' . $person['title_long'] . '">' . $person['title'] . '</acronym></span>';
                    endif; 
                    if (!empty($person['lastname'])) :
                        $p['lastname'] = '<span itemprop="familyName">' . $person['lastname'] . '</span>';
                        if (!empty($person['firstname'])) : 
                            $p['lastname'] .= ',';
                        endif;
                    endif;
                    if (!empty($person['firstname'])) :
                        $p['firstname'] = '<span itemprop="givenName">' . $person['firstname'] . '</span>';
                    endif;
                    if(!empty($p)) :
                        $n = implode(' ', $p);
                        if (!empty($person['id'])) :
                            $url = get_permalink() . 'univisid/' . $person['id'];
                            $fullname .= '<a class="url" href="' . $url . '" itemprop="name">';
                        endif; 
                        $fullname .= $n;
                        if (!empty($person['id'])) :
                            $fullname .= '</a>';
                        endif;  
                        $name['fullname'] = $fullname;
                    endif;
                    $pers['fullname'] = implode(' ', $name);
                    if (!empty($person['atitle'])) :
                        $pers['atitle'] = '<span itemprop="honorificSuffix"><acronym title="' . $person['atitle_long'] . '">' . $person['atitle'] . '</acronym></span>';                      
                    endif;
                    if (!empty( $person['locations'][0]['location'][0] ) ) :
                        $location = $person['locations'][0]['location'][0]; 
                        if (!empty($location['tel'])  && (!empty( $daten['optionen']['telefon']))) : 
                            $phone_number = self::correct_phone_number($location['tel']); 
                            $pers['phone_number'] = '<span class="person-info-phone" itemprop="telephone">Tel. ' . $phone_number . '</span>';
                        endif; 
                        if (!empty($location['email']) && (!empty( $daten['optionen']['mail']))) : 
                            $email = $location['email'];
                            $pers['email'] = '<span class="person-info-email">E-Mail: <a itemprop="email" href="mailto:' . strtolower($email) . '">' . strtolower($email) . '</a></span>';                        
                        endif;
                    endif;
                    $out = implode(', ', $pers);
                    ?>
                    <span class="person-info" itemprop="name"><?php echo $out;?></span>
                    
                <?php $text_out = '';
                if ( $suffix!='' && !empty( $person[$text] ) ): 
                    $text_out = $person[$text];
                elseif ( !empty( $person['text'] ) ) :
                    $text_out = $person['text'];
                endif;
                if ( !empty( $text_out ) ) : ?>
                <span><?php echo $text_out; ?></span>
                <?php endif; ?>
            </li>            
        <?php endforeach; ?>
    </ul>
    <?php endif;
    endforeach; ?>
</div>
