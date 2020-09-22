<?php

class View
{
    function generate($content_view, $template_view, $data = null, $add_data = null, $add_data2 = null, $add_data3 = null)
    {                      
            include 'views/'.$template_view;
    }
}

