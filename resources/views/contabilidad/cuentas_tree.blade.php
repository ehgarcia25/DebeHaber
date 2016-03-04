

<?php $nivel = "";
global $nivel;

function recorrer_menu_familias($padre, $nivel_anterior)
{

    foreach (App\Cuenta::Padre($padre) as $item) {

        if ($GLOBALS['nivel'] == null) {
            echo "<li id='$item->id'> \n";

        } else {
            //según la diferencia de nivel actual con el anterior guardada en $GLOBALS['nivel'] se cierran o abren etiquetas <Li>
            $diferencia = $item->level - $GLOBALS['nivel'];
            if ($diferencia == 0) echo "</li>\n<li  id='$item->id'>\n"; //no ha cambiado de nivel de subfamilia respecto al anterior
            if ($diferencia == 1) echo "<ul>\n<li  id='$item->id'>\n"; //ha subido un nivel de subfamilia respecto al anterior
            if ($diferencia == -1) echo "</li>\n</ul>\n<li  id='$item->id'>\n"; //ha bajado un nivel de subfamilia respecto al anterior
            if ($diferencia < (-1)) {
                //baja varios niveles de subfamilia respecto al anterior
                echo "</li>";
                for ($i = $diferencia; $i < 0; $i++)
                    echo "</ul>\n</li>\n";
                echo "<li  id='$item->id'>\n";
            }
        }
        echo  "<a id='$item->id' href='" . $item->id . "'>" . $item->name ." ".$item->code . "</a>" ;

        //actualiza $GLOBALS['nivel'] al nivel actual
        $GLOBALS['nivel'] = $item->level;

        //se llama a si mismo para comprovar quienes son los hijos de la familia actual
        recorrer_menu_familias($item->id, $item->level);
    }


}

function muestra_menu_familias()
{
    recorrer_menu_familias(0, "");
    echo "</li>\n";
    for ($i = 0; $i == $GLOBALS['nivel']; $i++)
        echo "</ul>\n</li>\n";
}

?>
            <ul>
                <?php muestra_menu_familias(); ?></ul>
