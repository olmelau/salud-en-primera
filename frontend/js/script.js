// Función para crear el histograma de sueño
function crearHistograma(datos) {
    // Limpiar el contenedor por si acaso
    d3.select("#histograma_generado").html("");
    
    // Configuración del histograma
    const paso = 5; // Cambiado a 5 para datos de sueño (horas)
    const min = 0;
    const max = 24; // 24 horas del día

    const margin = { top: 60, right: 30, bottom: 60, left: 60 },
        width = 700 - margin.left - margin.right,
        height = 450 - margin.top - margin.bottom;

    const svg = d3
        .select("#histograma_generado")
        .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", `translate(${margin.left},${margin.top})`);

    // Definir el Degradado
    const defs = svg.append("defs");
    const gradient = defs
        .append("linearGradient")
        .attr("id", "bar-gradient-sueno") // ID único para evitar conflictos
        .attr("x1", "0%")
        .attr("y1", "100%")
        .attr("x2", "0%")
        .attr("y2", "0%");

    gradient.append("stop").attr("offset", "0%").attr("stop-color", "#2c3e50");
    gradient.append("stop").attr("offset", "100%").attr("stop-color", "#4ca1af");

    // Procesar Bins y Escalas
    const cortes = d3.range(min, max + paso, paso);
    const bins = d3.bin().domain([min, max]).thresholds(cortes)(datos);
    const etiquetas = bins.map((d) => `${d.x0}-${d.x1}`);

    const x = d3.scaleBand().domain(etiquetas).range([0, width]).padding(0.2);
    const y = d3
        .scaleLinear()
        .domain([0, d3.max(bins, (d) => d.length)])
        .nice()
        .range([height, 0]);

    // Dibujar Ejes
    svg
        .append("g")
        .attr("transform", `translate(0, ${height})`)
        .call(d3.axisBottom(x));
        
    svg.append("g").call(d3.axisLeft(y));

    // Barras con ANIMACIÓN
    svg
        .selectAll("rect")
        .data(bins)
        .join("rect")
        .attr("fill", "url(#bar-gradient-sueno)")
        .attr("x", (d, i) => x(etiquetas[i]))
        .attr("width", x.bandwidth())
        .attr("y", height) // Inicia en el suelo
        .attr("height", 0) // Inicia con altura 0
        .transition() // Iniciamos la animación
        .duration(1000) // 1 segundo de duración
        .delay((d, i) => i * 50) // Efecto cascada
        .attr("y", (d) => y(d.length))
        .attr("height", (d) => height - y(d.length));

    // Etiquetas de datos con Animación
    svg
        .selectAll(".label")
        .data(bins)
        .join("text")
        .attr("class", "label")
        .attr("x", (d, i) => x(etiquetas[i]) + x.bandwidth() / 2)
        .attr("y", height)
        .attr("text-anchor", "middle")
        .style("opacity", 0)
        .transition()
        .duration(1000)
        .delay((d, i) => i * 50 + 500)
        .attr("y", (d) => y(d.length) - 8)
        .style("opacity", 1)
        .text((d) => (d.length > 0 ? d.length : ""));

    // Títulos
    svg
        .append("text")
        .attr("class", "chart-title")
        .attr("x", width / 2)
        .attr("y", -margin.top / 2)
        .attr("text-anchor", "middle")
        .style("font-size", "16px")
        .style("font-weight", "bold")
        .text("Distribución de Horas de Sueño");
        
    svg
        .append("text")
        .attr("class", "axis-label")
        .attr("x", width / 2)
        .attr("y", height + 45)
        .attr("text-anchor", "middle")
        .text("Horas de Sueño");
        
    svg
        .append("text")
        .attr("class", "axis-label")
        .attr("transform", "rotate(-90)")
        .attr("y", -margin.left + 20)
        .attr("x", -height / 2)
        .attr("text-anchor", "middle")
        .text("Frecuencia");
}