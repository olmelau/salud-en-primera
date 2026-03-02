<!-- CUESTIONARIO DE ADHERENCIA A LA DIETA MEDITERRANEA

1 ¿Usa usted el aceite de oliva como principal grasa para cocinar?
        Si= 1 punto
        No= 0 puntos
2 ¿Cuánto aceite de oliva consume en total al día (incluyendo el usado para freír, el de las comidas
fuera de casa, las ensaladas, etc.)?
        Dos o más cucharadas = 1 punto
        Menos de dos cucharadas = 0 puntos
3 ¿Cuántas raciones de verdura u hortalizas consume al día (las guarniciones o acompañamientos
contabilizan como ½ ración?
    Dos o más a día (al menos una de ellas en ensaladas o crudas)=1 punto
    Menos de dos raciones= 0 puntos
4 ¿Cuántas piezas de fruta (incluyendo zumo natural) consume al día?
    Tres o más al día=1 punto
    Menos de tres= 0 puntos
5 ¿Cuántas raciones de carnes rojas, hamburguesas, salchichas o embutidos consume al día (una ración
equivale a 100-150 gr)?
    Menos de una al día=1 punto
    Más de una ración= 0 puntos
6 ¿Cuántas raciones de mantequilla, margarina o nata consume al día (una porción individual
equivale a 12 gr)?
    Menos de una al día=1 punto
    Más de una ración= 0 puntos
7 ¿Cuántas bebidas carbonatadas y/o azucaradas (refrescos, colas, tónicas, bitter) consume al día?
    Menos de una al día=1 punto
    Más de una = 0 puntos
8 ¿Bebe vino? ¿Cuánto consume a la semana?
    Tres o más vasos por semana=1 punto
    Menos de tres a la semana= 0 puntos
9 ¿Cuántas raciones de legumbres consume a la semana (una ración o plato equivale a 150 gr)?
    Tres o más por semana=1 punto
    Menos de tres a la semana = 0 puntos
10 ¿Cuántas raciones de pescado o mariscos consume a la semana (un plato, pieza o ración equivale a
100-150 gr de pescado ó 4-5 piezas de marisco)?
    Tres o más por semana=1 punto
    Menos de tres a la semana = 0 puntos
11 ¿Cuántas veces consume repostería comercial (no casera) como galletas, flanes, dulces o pasteles a la
semana?
    Menos de tres por semana=1 punto
    Menos de tres a la semana = 0 puntos
12 ¿Cuántas veces consume frutos secos a la semana (una ración equivale a 30 gr)?
    Una o más por semana=1 punto
    Menos de una a la semana=0 puntos
13 ¿Consume preferentemente carne de pollo, pavo o conejo en vez de ternera, cerdo, hamburguesas o
salchichas (carne de pollo: una pieza o ración
equivale a 100-150 gr)?
    Si=1 punto
    No=0 puntos
14 ¿Cuántas veces a la semana consume los vegetales cocinados, la pasta, el arroz u otros platos
aderezados con una salsa de tomate, ajo, cebolla o
puerro elaborada a fuego lento con aceite de oliva
(sofrito)?
    Dos o más por semana=1 punto
    Menos de dos a la semana= 0 puntos -->

    <!-- RESULTADO FINAL (Total) -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario de Adherencia a la Dieta Mediterranea</title>
</head>
<body>
    <h1>CUESTIONARIO DE ADHERENCIA A LA DIETA MEDITERRANEA</h1>

    <form>
        <!-- PREGUNTA 1 -->
        <div>
            <p>1 ¿Usa usted el aceite de oliva como principal grasa para cocinar?</p>
            <input type="radio" name="pregunta1" value="1" id="p1_si">
            <label for="p1_si">Sí (1 punto)</label><br>
            <input type="radio" name="pregunta1" value="0" id="p1_no">
            <label for="p1_no">No (0 puntos)</label>
        </div> 

        <!-- PREGUNTA 2 -->
        <div>
            <p>2 ¿Cuánto aceite de oliva consume en total al día (incluyendo el usado para freír, el de las comidas fuera de casa, las ensaladas, etc.)?</p>
            <input type="radio" name="pregunta2" value="1" id="p2_mas">
            <label for="p2_mas">Dos o más cucharadas (1 punto)</label><br>
            <input type="radio" name="pregunta2" value="0" id="p2_menos">
            <label for="p2_menos">Menos de dos cucharadas (0 puntos)</label>
        </div>

        <!-- PREGUNTA 3 -->
        <div>
            <p>3 ¿Cuántas raciones de verdura u hortalizas consume al día (las guarniciones o acompañamientos contabilizan como ½ ración?</p>
            <input type="radio" name="pregunta3" value="1" id="p3_mas">
            <label for="p3_mas">Dos o más a día (al menos una de ellas en ensaladas o crudas) (1 punto)</label><br>
            <input type="radio" name="pregunta3" value="0" id="p3_menos">
            <label for="p3_menos">Menos de dos raciones (0 puntos)</label>
        </div>

        <!-- PREGUNTA 4 -->
        <div>
            <p>4 ¿Cuántas piezas de fruta (incluyendo zumo natural) consume al día?</p>
            <input type="radio" name="pregunta4" value="1" id="p4_mas">
            <label for="p4_mas">Tres o más al día (1 punto)</label><br>
            <input type="radio" name="pregunta4" value="0" id="p4_menos">
            <label for="p4_menos">Menos de tres (0 puntos)</label>
        </div>

        <!-- PREGUNTA 5 -->
        <div>
            <p>5 ¿Cuántas raciones de carnes rojas, hamburguesas, salchichas o embutidos consume al día (una ración equivale a 100-150 gr)?</p>
            <input type="radio" name="pregunta5" value="1" id="p5_menos">
            <label for="p5_menos">Menos de una al día (1 punto)</label><br>
            <input type="radio" name="pregunta5" value="0" id="p5_mas">
            <label for="p5_mas">Más de una ración (0 puntos)</label>
        </div>

        <!-- PREGUNTA 6 -->
        <div>
            <p>6 ¿Cuántas raciones de mantequilla, margarina o nata consume al día (una porción individual equivale a 12 gr)?</p>
            <input type="radio" name="pregunta6" value="1" id="p6_menos">
            <label for="p6_menos">Menos de una al día (1 punto)</label><br>
            <input type="radio" name="pregunta6" value="0" id="p6_mas">
            <label for="p6_mas">Más de una ración (0 puntos)</label>
        </div>

        <!-- PREGUNTA 7 -->
        <div>
            <p>7 ¿Cuántas bebidas carbonatadas y/o azucaradas (refrescos, colas, tónicas, bitter) consume al día?</p>
            <input type="radio" name="pregunta7" value="1" id="p7_menos">
            <label for="p7_menos">Menos de una al día (1 punto)</label><br>
            <input type="radio" name="pregunta7" value="0" id="p7_mas">
            <label for="p7_mas">Más de una (0 puntos)</label>
        </div>

        <!-- PREGUNTA 8 -->
        <div>
            <p>8 ¿Bebe vino? ¿Cuánto consume a la semana?</p>
            <input type="radio" name="pregunta8" value="1" id="p8_mas">
            <label for="p8_mas">Tres o más vasos por semana (1 punto)</label><br>
            <input type="radio" name="pregunta8" value="0" id="p8_menos">
            <label for="p8_menos">Menos de tres a la semana (0 puntos)</label>
        </div>

        <!-- PREGUNTA 9 -->
        <div>
            <p>9 ¿Cuántas raciones de legumbres consume a la semana (una ración o plato equivale a 150 gr)?</p>
            <input type="radio" name="pregunta9" value="1" id="p9_mas">
            <label for="p9_mas">Tres o más por semana (1 punto)</label><br>
            <input type="radio" name="pregunta9" value="0" id="p9_menos">
            <label for="p9_menos">Menos de tres a la semana (0 puntos)</label>
        </div>

        <!-- PREGUNTA 10 -->
        <div>
            <p>10 ¿Cuántas raciones de pescado o mariscos consume a la semana (un plato, pieza o ración equivale a 100-150 gr de pescado ó 4-5 piezas de marisco)?</p>
            <input type="radio" name="pregunta10" value="1" id="p10_mas">
            <label for="p10_mas">Tres o más por semana (1 punto)</label><br>
            <input type="radio" name="pregunta10" value="0" id="p10_menos">
            <label for="p10_menos">Menos de tres a la semana (0 puntos)</label>
        </div>

        <!-- PREGUNTA 11 -->
        <div>
            <p>11 ¿Cuántas veces consume repostería comercial (no casera) como galletas, flanes, dulces o pasteles a la semana?</p>
            <input type="radio" name="pregunta11" value="1" id="p11_menos">
            <label for="p11_menos">Menos de tres por semana (1 punto)</label><br>
            <input type="radio" name="pregunta11" value="0" id="p11_mas">
            <label for="p11_mas">Menos de tres a la semana (0 puntos)</label>
        </div>

        <!-- PREGUNTA 12 -->
        <div>
            <p>12 ¿Cuántas veces consume frutos secos a la semana (una ración equivale a 30 gr)?</p>
            <input type="radio" name="pregunta12" value="1" id="p12_mas">
            <label for="p12_mas">Una o más por semana (1 punto)</label><br>
            <input type="radio" name="pregunta12" value="0" id="p12_menos">
            <label for="p12_menos">Menos de una a la semana (0 puntos)</label>
        </div>

        <!-- PREGUNTA 13 -->
        <div>
            <p>13 ¿Consume preferentemente carne de pollo, pavo o conejo en vez de ternera, cerdo, hamburguesas o salchichas (carne de pollo: una pieza o ración equivale a 100-150 gr)?</p>
            <input type="radio" name="pregunta13" value="1" id="p13_si">
            <label for="p13_si">Sí (1 punto)</label><br>
            <input type="radio" name="pregunta13" value="0" id="p13_no">
            <label for="p13_no">No (0 puntos)</label>
        </div>

        <!-- PREGUNTA 14 -->
        <div>
            <p>14 ¿Cuántas veces a la semana consume los vegetales cocinados, la pasta, el arroz u otros platos aderezados con una salsa de tomate, ajo, cebolla o puerro elaborada a fuego lento con aceite de oliva (sofrito)?</p>
            <input type="radio" name="pregunta14" value="1" id="p14_mas">
            <label for="p14_mas">Dos o más por semana (1 punto)</label><br>
            <input type="radio" name="pregunta14" value="0" id="p14_menos">
            <label for="p14_menos">Menos de dos a la semana (0 puntos)</label>
        </div>

        <hr>
        <!-- RESULTADO FINAL (Total) -->
        <div>
            <label for="resultado">RESULTADO FINAL (Total):</label>
            <input type="text" id="resultado" name="resultado" readonly placeholder="Puntuación total">
        </div>
    </form>
</body>
</html>