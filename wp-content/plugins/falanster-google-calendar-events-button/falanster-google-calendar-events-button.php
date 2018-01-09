<?php
/*
Plugin Name: Falanster Events
Description: Falanster Events - плагин для легкого расшаривания событий в гуглкалендарь.
Version: 1.0
Author: Poyarkov Viktor.
Author URI: https://vk.com/id36220747

*/

// Создаем меню в консоли:

//add_action('admin_menu', 'falanster_events_create_menu');

// создаем поле для ввода данных на странице добавления.исправления записи, подключаем скрипты
add_action( 'admin_footer', 'script_falanster_input_calendar' );
add_action('add_meta_boxes', 'falanster_events_create_page_post');
add_action('save_post', 'falanster_event_save');
add_filter( 'the_content', 'filter_function_get_google_event' );


function filter_function_get_google_event( $content ) {
	// Фильтр...
  global $post;
	return $content.get_post_meta($post->ID, '_falanster_event', true);
}


 
//function falanster_events_create_menu(){
//    // Создаем новые пункты в закладке "Страницы"
//    add_pages_page('Falanster Events Page', 'Falanster-мероприятия', 8, 'falanster_events_main_menu',
//    'falanster_events_main_plugin_page'); 
//    add_pages_page('Falanster New Event Page', 'Добавить новое Falanster-мероприятие', 8, 'falanster_new_event',
//    'falanster_new_event_plugin_page');
//}    
    
 function script_falanster_input_calendar(){
    echo '
    <link rel="stylesheet" type="text/css" href="'.plugins_url('tcal.css',__FILE__).'" />

    <script type="text/javascript" src="'.plugins_url('tcal.js',__FILE__).'"></script> ';
 
 }  
function falanster_events_create_page_post(){
    // Создаем поле для определения мероприятия на странице добавления/редактирования страницы))
    add_meta_box('falanster_events_section','Добавление falanster-мероприятия','falanster_events_section', 'post','side');
}


function falanster_events_section($post,$box) {
  // извлекаем старые данные, чтобы потом поместить в поля ввода
  // Верстаем форму для создания мероприятия 
  
  $old_start_date = get_post_meta($post->ID,'_start_date', true) ;
  $old_end_date = get_post_meta($post->ID,'_end_date', true);
  $old_start_time = get_post_meta($post->ID,'_start_time', true);
  $old_end_time = get_post_meta($post->ID,'_end_time', true);
  $old_title_event = get_post_meta($post->ID,'_title_event', true);
  $old_location_event = get_post_meta($post->ID,'_location_event', true);
  $old_description_event = get_post_meta($post->ID,'_description_event', true);
  $watches = [ 
        ['000000' ,'00:00'],
        ['003000' ,'00:30'],
        ['010000' ,'01:00'],
        ['013000' ,'01:30'],
        ['020000' ,'02:00'],
        ['023000' ,'02:30'],
        ['030000' ,'03:00'],
        ['033000' ,'03:30'],
        ['040000' ,'04:00'],
        ['043000' ,'04:30'],
        ['050000' ,'05:00'],
        ['053000' ,'05:30'],
        ['060000' ,'06:00'],
        ['063000' ,'06:30'],
        ['070000' ,'07:00'],
        ['073000' ,'07:30'],
        ['080000' ,'08:00'],
        ['083000' ,'08:30'],
        ['090000' ,'09:00'],
        ['093000' ,'09:30'],
        ['100000' ,'10:00'],
        ['103000' ,'10:30'],
        ['110000' ,'11:00'],
        ['113000' ,'11:30'],
        ['120000' ,'12:00'],
        ['123000' ,'12:30'],
        ['130000' ,'13:00'],
        ['133000' ,'13:30'],
        ['140000' ,'14:00'],
        ['143000' ,'14:30'],
        ['150000' ,'15:00'],
        ['153000' ,'15:30'],
        ['160000' ,'16:00'],
        ['163000' ,'16:30'],
        ['170000' ,'17:00'],
        ['173000' ,'17:30'],
        ['180000' ,'18:00'],
        ['183000' ,'18:30'],
        ['190000' ,'19:00'],
        ['193000' ,'19:30'],
        ['200000' ,'20:00'],
        ['203000' ,'20:30'],
        ['210000' ,'21:00'],
        ['213000' ,'21:30'],
        ['220000' ,'22:00'],
        ['223000' ,'22:30'],
        ['230000' ,'23:00'],
        ['233000' ,'23:30']
    ] ;
    // wp_nonce_field('action_nonce_falanster_event','_nonce_falanster_event');
   
  echo '
       <p><strong>Название мероприятия:</strong><p>  
     
    <input type="text" placeholder="Без мероприятия" name="title_event" value="'.$old_title_event.'"/>
    <p><strong>Начало мероприятия:</strong><p>  
    <input type="text" size="10" name="start_date" class="tcal" value="'.$old_start_date.'">
    <select name="start_time" id="start_time">';
     
    foreach($watches as $watch){
    if($watch[0]==$old_start_time){
       $isSelected = 'selected';
    }
    else{
    $isSelected ='';
    }
    echo'<option value="'.$watch[0].'" '.$isSelected.'>'.$watch[1].'</option> ';
    }
  
   echo'
    </select>
    
    <p><strong>Окончание мероприятия:</strong><p>  
    <input type="text" size="10" name="end_date" class="tcal" value="'.$old_end_date.'">
    <select name="end_time" id="end_time">';
    foreach($watches as $watch){
    if($watch[0]==$old_end_time){
       $isSelected = 'selected';
    }
    else{
    $isSelected ='';
    }
    echo'<option value="'.$watch[0].'" '.$isSelected.'>'.$watch[1].'</option> ';
    }
    
    echo'</select>';
    
    echo '
      <p><strong>Место: </strong><p>  
     
    <input type="text" placeholder="Место" name="location_event" value="'.$old_location_event.'"/>
    
    <p><strong>Описание:</strong><p>  
     
    <input type="text" placeholder="Описание" name="description_event" value="'.$old_description_event.'"/>
    <br><br>
    <input type="checkbox" name="delete_form" value="delete">Удалить мероприятие
    
    ';
    
}

// сохраняем данные
function falanster_event_save($postId){
    
    
   
    // пришло ли поле наших данных? 
     if (!isset($_POST['title_event'])&&!($_POST['title_event'])=='') 
     return; 

     // не происходит ли автосохранение? 
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
    return; 

    // не ревизию ли сохраняем? 
    if (wp_is_post_revision($postId)) 
    return;
   
    
    
    // проверяем временное значение для безопасности
    //check_admin_referer('action_nonce_falanster_event','_nonce_falanster_event');   //какой-то баг и эта проверка не проходит
    //check_admin_referer( 'bcn_admin_options' ); 
     // если нажата кнопка удалить мероприятие
    if (isset($_POST['delete_form'])){
         delete_post_meta($postId, '_falanster_event'); 
         delete_post_meta($postId, '_start_date');
         delete_post_meta($postId, '_end_date');
         delete_post_meta($postId, '_start_time');
         delete_post_meta($postId,'_end_time');
         delete_post_meta($postId, '_title_event');
         delete_post_meta($postId, '_location_event');
         delete_post_meta($postId, '_description_event');
       
    }else{
    
    
    $title= str_replace(' ','+',$_POST['title_event'] );
    $start_date = explode('/',$_POST['start_date'])  ;
    $end_date = explode('/',$_POST['end_date']);
    $loacation =  str_replace(' ','+',$_POST['location_event'] );
    $description =  str_replace(' ','+',$_POST['description_event'] );
    $link = '<a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text='.
    $title.'&dates='.$start_date[2].$start_date[1].$start_date[0].'T'.
    $_POST['start_time'].'/'.
    $end_date[2].$end_date[1].$end_date[0].'T'.
    $_POST['end_time'].'&details='.$description.'&location='.$loacation.'&trp=false&sprop=website:http://localhost&ctz=Europe/Helsinki&sf=true&output=xml#eventpage_6"><img border="0" src="https://www.google.com/calendar/images/ext/gc_button1_ru.gif"></a>';
    // запись метаданных
    update_post_meta($postId, '_falanster_event',$link); 
    update_post_meta($postId, '_start_date',$_POST['start_date']);
    update_post_meta($postId, '_end_date',$_POST['end_date']);
    update_post_meta($postId, '_start_time',$_POST['start_time']);
    update_post_meta($postId, '_end_time',$_POST['end_time']);
    update_post_meta($postId, '_title_event',$_POST['title_event']);
    update_post_meta($postId, '_location_event',$_POST['location_event']);
    update_post_meta($postId, '_description_event',$_POST['description_event']); 
    }
}



