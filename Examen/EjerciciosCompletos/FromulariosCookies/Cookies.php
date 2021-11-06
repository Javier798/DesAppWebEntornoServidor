<?php

if (isset($_COOKIE["visita_pagina"])) {
    if ($_COOKIE["visita_pagina"] == 0) {
        echo "Bienvenido";
        
        setcookie("visita_pagina", $_COOKIE["visita_pagina"] + 1, time() + (2 * 3600 * 24));
    } elseif ($_COOKIE["visita_pagina"] == 10) {
        setcookie("visita_pagina", 0, time() -1);
        echo "Eliminando cookie";
    } else {

        $visita = $_COOKIE["visita_pagina"];
        
        setcookie("visita_pagina", $_COOKIE["visita_pagina"] + 1, time() + (2 * 3600 * 24));
        echo "Visita $visita";
    }
} else {
    echo "reseteando cookie";
    setcookie("visita_pagina", "0", time() +1);
}
