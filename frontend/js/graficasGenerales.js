/**
 * Función genérica para crear gráficas categóricas (histogramas agrupados)
 */
function crearGraficaCategorica(contenedorId, datos, campoCategoria, campoSubcategoria, campoValor, titulo, etiquetaX, etiquetaY, tipo) {
    // Limpiar contenedor
    d3.select(`#${contenedorId}`).html("");
    
    // Configuración de dimensiones
    const margin = { top: 60, right: 150, bottom: 80, left: 70 };
    const width = 900 - margin.left - margin.right;
    const height = 500 - margin.top - margin.bottom;
    
    // Crear SVG
    const svg = d3.select(`#${contenedorId}`)
        .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", `translate(${margin.left},${margin.top})`);
    
    // Obtener categorías únicas
    const categorias = [...new Set(datos.map(d => d[campoCategoria]))];
    const subcategorias = [...new Set(datos.map(d => d[campoSubcategoria]))];
    
    // Escala de colores
    const colorScale = d3.scaleOrdinal()
        .domain(subcategorias)
        .range(['#4ca1af', '#2c3e50', '#e74c3c', '#f39c12', '#27ae60']);
    
    // Escalas
    const x0 = d3.scaleBand()
        .domain(categorias)
        .range([0, width])
        .padding(0.2);
    
    const x1 = d3.scaleBand()
        .domain(subcategorias)
        .range([0, x0.bandwidth()])
        .padding(0.05);
    
    const y = d3.scaleLinear()
        .domain([0, d3.max(datos, d => d[campoValor]) * 1.2])
        .nice()
        .range([height, 0]);
    
    // Ejes
    svg.append("g")
        .attr("transform", `translate(0,${height})`)
        .call(d3.axisBottom(x0))
        .selectAll("text")
        .attr("transform", "rotate(-45)")
        .style("text-anchor", "end");
    
    svg.append("g")
        .call(d3.axisLeft(y));
    
    // Barras
    svg.append("g")
        .selectAll("g")
        .data(categorias)
        .join("g")
        .attr("transform", d => `translate(${x0(d)},0)`)
        .selectAll("rect")
        .data(categoria => {
            return subcategorias.map(subcat => {
                const dato = datos.find(d => 
                    d[campoCategoria] === categoria && d[campoSubcategoria] === subcat
                );
                return {
                    subcategoria: subcat,
                    valor: dato ? dato[campoValor] : 0
                };
            });
        })
        .join("rect")
        .attr("x", d => x1(d.subcategoria))
        .attr("y", height)
        .attr("width", x1.bandwidth())
        .attr("height", 0)
        .attr("fill", d => colorScale(d.subcategoria))
        .transition()
        .duration(800)
        .attr("y", d => y(d.valor))
        .attr("height", d => height - y(d.valor));
    
    // Leyenda
    const leyenda = svg.append("g")
        .attr("transform", `translate(${width + 20}, 0)`);
    
    subcategorias.forEach((subcat, i) => {
        const leyendaItem = leyenda.append("g")
            .attr("transform", `translate(0, ${i * 25})`);
        
        leyendaItem.append("rect")
            .attr("width", 15)
            .attr("height", 15)
            .attr("fill", colorScale(subcat));
        
        leyendaItem.append("text")
            .attr("x", 20)
            .attr("y", 12)
            .text(subcat)
            .style("font-size", "12px");
    });
    
    // Títulos
    svg.append("text")
        .attr("x", width / 2)
        .attr("y", -20)
        .attr("text-anchor", "middle")
        .style("font-size", "16px")
        .style("font-weight", "bold")
        .text(titulo);
    
    svg.append("text")
        .attr("x", width / 2)
        .attr("y", height + 60)
        .attr("text-anchor", "middle")
        .text(etiquetaX);
    
    svg.append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", -margin.left + 20)
        .attr("x", -height / 2)
        .attr("text-anchor", "middle")
        .text(etiquetaY);
}

/**
 * Función genérica para gráficas de dispersión (nube de puntos)
 */
function crearGraficaDispersion(contenedorId, datos, campoCategoria, campoX, campoColor, titulo, etiquetaX, etiquetaY) {
    // Limpiar contenedor
    d3.select(`#${contenedorId}`).html("");
    
    // Configuración
    const margin = { top: 60, right: 150, bottom: 80, left: 70 };
    const width = 900 - margin.left - margin.right;
    const height = 500 - margin.top - margin.bottom;
    
    // Crear SVG
    const svg = d3.select(`#${contenedorId}`)
        .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", `translate(${margin.left},${margin.top})`);
    
    // Preparar datos
    const categorias = [...new Set(datos.map(d => d[campoCategoria]))];
    const coloresCategorias = [...new Set(datos.map(d => d[campoColor]))];
    
    // Escalas
    const xScale = d3.scaleBand()
        .domain(categorias)
        .range([0, width])
        .padding(0.5);
    
    const yScale = d3.scaleLinear()
        .domain([0, d3.max(datos, d => d[campoX]) * 1.2])
        .nice()
        .range([height, 0]);
    
    const colorScale = d3.scaleOrdinal()
        .domain(coloresCategorias)
        .range(['#4ca1af', '#e74c3c', '#2c3e50', '#f39c12']);
    
    // Ejes
    svg.append("g")
        .attr("transform", `translate(0,${height})`)
        .call(d3.axisBottom(xScale))
        .selectAll("text")
        .attr("transform", "rotate(-45)")
        .style("text-anchor", "end");
    
    svg.append("g")
        .call(d3.axisLeft(yScale));
    
    // Puntos con jitter para evitar solapamiento
    const jitterWidth = xScale.bandwidth() / 3;
    
    svg.selectAll("circle")
        .data(datos)
        .join("circle")
        .attr("cx", d => {
            const base = xScale(d[campoCategoria]) + xScale.bandwidth() / 2;
            return base + (Math.random() - 0.5) * jitterWidth;
        })
        .attr("cy", height)
        .attr("r", 0)
        .attr("fill", d => colorScale(d[campoColor]))
        .attr("opacity", 0.7)
        .transition()
        .duration(1000)
        .attr("cy", d => yScale(d[campoX]))
        .attr("r", 6);
    
    // Leyenda
    const leyenda = svg.append("g")
        .attr("transform", `translate(${width + 20}, 0)`);
    
    coloresCategorias.forEach((cat, i) => {
        const item = leyenda.append("g")
            .attr("transform", `translate(0, ${i * 25})`);
        
        item.append("circle")
            .attr("r", 6)
            .attr("fill", colorScale(cat))
            .attr("opacity", 0.7);
        
        item.append("text")
            .attr("x", 12)
            .attr("y", 4)
            .text(cat)
            .style("font-size", "12px");
    });
    
    // Títulos
    svg.append("text")
        .attr("x", width / 2)
        .attr("y", -20)
        .attr("text-anchor", "middle")
        .style("font-size", "16px")
        .style("font-weight", "bold")
        .text(titulo);
    
    svg.append("text")
        .attr("x", width / 2)
        .attr("y", height + 60)
        .attr("text-anchor", "middle")
        .text(etiquetaX);
    
    svg.append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", -margin.left + 20)
        .attr("x", -height / 2)
        .attr("text-anchor", "middle")
        .text(etiquetaY);
}

/**
 * Función para crear histograma simple (datos numéricos)
 */
function crearHistogramaSimple(contenedorId, datos, campoValor, titulo, etiquetaX, etiquetaY, numBins = 10) {
    // Limpiar contenedor
    d3.select(`#${contenedorId}`).html("");
    
    const margin = { top: 60, right: 30, bottom: 60, left: 60 };
    const width = 700 - margin.left - margin.right;
    const height = 450 - margin.top - margin.bottom;
    
    const svg = d3.select(`#${contenedorId}`)
        .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", `translate(${margin.left},${margin.top})`);
    
    // Procesar datos
    const valores = datos.map(d => d[campoValor]);
    const xScale = d3.scaleLinear()
        .domain([d3.min(valores), d3.max(valores)])
        .range([0, width]);
    
    const bins = d3.histogram()
        .domain(xScale.domain())
        .thresholds(xScale.ticks(numBins))
        (valores);
    
    const yScale = d3.scaleLinear()
        .domain([0, d3.max(bins, d => d.length)])
        .range([height, 0]);
    
    // Gradiente
    const defs = svg.append("defs");
    const gradient = defs.append("linearGradient")
        .attr("id", `gradient-${contenedorId}`)
        .attr("x1", "0%")
        .attr("y1", "100%")
        .attr("x2", "0%")
        .attr("y2", "0%");
    
    gradient.append("stop").attr("offset", "0%").attr("stop-color", "#2c3e50");
    gradient.append("stop").attr("offset", "100%").attr("stop-color", "#4ca1af");
    
    // Barras
    svg.selectAll("rect")
        .data(bins)
        .join("rect")
        .attr("fill", `url(#gradient-${contenedorId})`)
        .attr("x", d => xScale(d.x0))
        .attr("y", height)
        .attr("width", d => xScale(d.x1) - xScale(d.x0) - 1)
        .attr("height", 0)
        .transition()
        .duration(1000)
        .attr("y", d => yScale(d.length))
        .attr("height", d => height - yScale(d.length));
    
    // Ejes
    svg.append("g")
        .attr("transform", `translate(0,${height})`)
        .call(d3.axisBottom(xScale));
    
    svg.append("g")
        .call(d3.axisLeft(yScale));
    
    // Títulos
    svg.append("text")
        .attr("x", width / 2)
        .attr("y", -20)
        .attr("text-anchor", "middle")
        .style("font-size", "16px")
        .style("font-weight", "bold")
        .text(titulo);
    
    svg.append("text")
        .attr("x", width / 2)
        .attr("y", height + 45)
        .attr("text-anchor", "middle")
        .text(etiquetaX);
    
    svg.append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", -margin.left + 20)
        .attr("x", -height / 2)
        .attr("text-anchor", "middle")
        .text(etiquetaY);
}