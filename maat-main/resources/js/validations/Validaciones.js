// Mira si es un valor válido cuando se introduce valores. Si no lo es previene
// que se introduzca la tecla al escribir el texto
function checkInput(e) {
    try {
        // Solo permite de la A-Z, a-z, 0-9, el ' - ', el ' . ' y el ' - '
        if (
            e.key == "Dead" ||
            (!/[A-Za-z0-9_.-]/.test(e.key) && e.key.charCodeAt(0) != 22)
        ) {
            e.preventDefault();

            // Solo permite valores que entren en el rango de ASCII 128 (código estandar de
            // intercambio de información americano)
        } else if (e.key.charCodeAt(0) < 32 || e.key.charCodeAt(0) > 126) {
            e.preventDefault();
        }
    } catch (error) {
        console.log(error);
    }
}

// Mira si es un valor válido cuando se introduce valores. Si no lo es, previene que se
// introduzca la tecla al texto
function checkInputEmail(e) {
    try {
        // Solo permite de la A-Z, a-z, 0-9, el ' . ', y la ' @ '
        if (
            e.key == "Dead" ||
            (!/[A-Za-z0-9.@]/.test(e.key) && e.key.charCodeAt(0) != 22)
        ) {
            e.preventDefault();

            // Solo permite valores que entren en el rango de ASCII 128 (código estandar de
            // intercambio de información americano)
        } else if (e.key.charCodeAt(0) < 32 || e.key.charCodeAt(0) > 126) {
            e.preventDefault();
        }
    } catch (error) {
        console.log(error);
    }
}

// Mira si es un valor válido cuando se introduce valores. Si no lo es, previene que se
// introduzca la tecla al texto
function checkInputTarjeta(e) {
    try {
        // Solo permite de la A-Z y 0-9
        if (
            e.key == "Dead" ||
            (!/[A-Z0-9]/.test(e.key) && e.key.charCodeAt(0) != 22)
        ) {
            e.preventDefault();
        }
    } catch (error) {
        console.log(error);
    }
}

function checkInputWithSpace(e) {
    try {
        // Solo permite de la A-Z, a-z, 0-9, el ' - ', el ' . ', el ' - ' y el espacio
        if (
            e.key == "Dead" ||
            (!/[A-Za-z0-9_.-]/.test(e.key) &&
                e.key.charCodeAt(0) != 22 &&
                e.key.charCodeAt(0) != 32)
        ) {
            e.preventDefault();

            // Solo permite valores que entren en el rango de ASCII 128 (código estandar de
            // intercambio de información americano)
        } else if (e.key.charCodeAt(0) < 32 || e.key.charCodeAt(0) > 126) {
            e.preventDefault();
        }
    } catch (error) {
        console.log(error);
    }
}

// Validaciones para ver si existe alguna injeccion no deseada en el texto
function checkInjection(txt) {
    try {
        // Si existe alguna de estas palabras en el texto, lo considerará como una injección
        if (
            txt.toLowerCase().indexOf("delete") != -1 ||
            txt.toLowerCase().indexOf("select") != -1 ||
            txt.toLowerCase().indexOf("edit") != -1 ||
            txt.toLowerCase().indexOf("drop") != -1 ||
            txt.toLowerCase().indexOf("update") != -1
        ) {
            return false;
        } else {
            return true;
        }
    } catch (error) {
        console.log(error);
    }
}

// Mira el usuario recibido y comprueba si es válido. Devolverá un boolean (false o true)
function checkUserTxt(usuario) {
    try {
        if (
            usuario.replaceAll(" ", "").length > 4 &&
            usuario.replaceAll(" ", "").length < 31
        ) {
            return true;
        } else {
            return false;
        }
    } catch (error) {
        console.log(error);
    }
}

// Mira el email introducido y lo valida. Devolverá un true o false dependiendo de su validez
function checkEmailTxt(email) {
    var email1 = "";
    var email2 = "";
    var email3 = "";

    try {
        // Divide el email en 3 partes

        email1 = email.substring(0, email.indexOf("@")).replaceAll(" ", "");
        email2 = email
            .substring(email.indexOf("@") + 1, email.lastIndexOf("."))
            .replaceAll(" ", "");
        email3 = email
            .substring(email.lastIndexOf(".") + 1, email.length)
            .replaceAll(" ", "");

        // Comprueba que tenga solo 1 o 2 puntos el email. Comprueba que el email
        // tenga una estructura parecida a AAA@AAA.com
        // También, comprueba que la extensión tenga una longitud 2 a 3 y que no
        // tenga dígitos.

        // Por último, utilizando regex reemplaza todos los carácteres que no sean ' . '
        if (email.indexOf(".") != -1) {
            if (
                email.replace(/[^.]/g, "").length >= 1 &&
                email.replace(/[^.]/g, "").length < 3 &&
                email1.length > 2 &&
                email2.length > 2 &&
                email3.length > 1 &&
                email3.length < 4 &&
                !/[0-9]/.test(email3)
            ) {
                return true;
            } else {
                return false;
            }

            // No existe un ' . ' en el email
        } else {
            return false;
        }
    } catch (error) {
        console.log(error);
    }
}

// Mira el email introducido y lo valida. Devolverá un true o false dependiendo de su validez
function checkPassword(password) {
    try {
        // Mira que password sea de longitud 8-16 y password.
        // Mira que tenga 1 número, 1 mayúscula y 1 minúscula
        if (
            password.length > 7 &&
            password.length <= 16 &&
            /[0-9]/.test(password) &&
            /[A-Z]/.test(password) &&
            /[a-z]/.test(password)
        ) {
            return true;
        } else {
            return false;
        }
    } catch (error) {
        console.log(error);
    }
}

// Mira el email introducido y lo valida. Devolverá un true o false dependiendo de su validez
function checkTarjeta(tarjeta) {
    try {
        // Tiene que tener 9 carácteres. El último carácter debe ser una mayúscula y
        // los demás deben ser números
        if (
            tarjeta.length == 9 &&
            /[A-Z]/.test(tarjeta.charAt(8)) &&
            !/[A-Z]/.test(tarjeta.substring(0, 8))
        ) {
            return true;

            // Si no cumple las condiciones, entonces devuelve falso
        } else {
            return false;
        }
    } catch (error) {
        console.log(error);
    }
}

// Valida la web
function checkWeb(web) {
    var contenedorWeb1 = "";
    var contenedorWeb2 = "";
    var contenedorWeb3 = "";
    var valido = false;

    try {
        // g se refiere a global (busca en todo el string).
        // ^ es para buscar todos los carácteres que no cumplan la condición
        if (web.replace(/[^.]/g, "").length == 1) {
            // Divide la página web en diferentes partes
            contenedorWeb1 = web.substring(0, web.indexOf("."));
            contenedorWeb2 = web.substring(web.indexOf(".") + 1, web.length);

            // Web 1 se refiere a la parte principal (necesario más de 3 carácteres)
            // Web 2 se refiere a la extensión (com, org, es, etc)
            if (
                contenedorWeb1.length > 2 &&
                contenedorWeb2.length >= 2 &&
                contenedorWeb2.length < 4
            ) {
                valido = true;
            }
        } else if (web.replace(/[^.]/g, "").length == 2) {
            // Divide la página web en diferentes partes
            contenedorWeb1 = web.substring(0, web.indexOf("."));
            contenedorWeb2 = web.substring(
                web.indexOf(".") + 1,
                web.lastIndexOf(".")
            );
            contenedorWeb3 = web.substring(
                web.lastIndexOf(".") + 1,
                web.length
            );

            // Web 1 se refiere a la parte inicial de la web (como www)
            // Web 2 se refiere a la parte principal (necesario más de 3 carácteres)
            // Web 3 se refiere a la extensión (com, org, es, etc)
            if (
                contenedorWeb1.length >= 2 &&
                contenedorWeb1.length < 4 &&
                contenedorWeb2.length > 2 &&
                contenedorWeb3.length >= 2 &&
                contenedorWeb3.length < 4 &&
                web.length < 256
            ) {
                valido = true;
            }
        }

        // Si es true, entonces es un valor válido.
        return valido;
    } catch (error) {
        console.log(error);
    }
}

// Validación de ubicación
function checkUbicacion(ubicacion) {
    try {
        if (
            ubicacion.replace(" ", "").length > 2 &&
            ubicacion.replace(/[^.]/g, "").length >= 0 &&
            ubicacion.replace(/[^.]/g, "").length < 2 &&
            ubicacion.replace(/[^-]/g, "").length >= 0 &&
            ubicacion.replace(/[^-]/g, "").length < 2 &&
            ubicacion.replace(/[^_]/g, "").length >= 0 &&
            ubicacion.replace(/[^_]/g, "").length < 2 &&
            ubicacion.length < 256
        ) {
            return true;
        } else {
            return false;
        }
    } catch (error) {
        console.log(error);
    }
}

// Exportarlo a otros componentes de Vue como métodos
export {
    checkInjection,
    checkInput,
    checkInputEmail,
    checkInputTarjeta,
    checkInputWithSpace,
    checkUserTxt,
    checkEmailTxt,
    checkPassword,
    checkTarjeta,
    checkWeb,
    checkUbicacion,
};
