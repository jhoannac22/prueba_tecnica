function calculateFactorial(n) {
    // Validación: el factorial no está definido para números negativos
    if (n < 0) {
        throw new Error("El factorial no está definido para números negativos");
    }

    // Casos base: 0! = 1 y 1! = 1
    if (n === 0 || n === 1) {
        return 1;
    }

    let result = 1;        // Variable para almacenar el resultado
    let calculation = "";  // String para mostrar el proceso de cálculo

    // Bucle para calcular el factorial: n × (n-1) × (n-2) × ... × 1
    for (let i = n; i >= 1; i--) {
        result *= i;           // Multiplicar el resultado por el número actual
        calculation += i;      // Agregar el número al string de cálculo

        // Agregar el símbolo de multiplicación si no es el último número
        if (i > 1) {
            calculation += " × ";
        }
    }

    // Retornar tanto el resultado como el proceso de cálculo
    return { result: result, calculation: calculation };
}

function formatNumber(num) {
    return num.toLocaleString('es-GT');  // Formato guatemalteco con comas
}

/**
 * Event Listener para el formulario de cálculo de factorial
 * Se ejecuta cuando el usuario envía el formulario (hace clic en "Calcular Factorial")
 */
document.getElementById('factorialForm').addEventListener('submit', function (e) {
    e.preventDefault();  // Prevenir el comportamiento por defecto del formulario

    // Obtener referencias a los elementos del DOM
    const numberInput = document.getElementById('factorialNumber');      // Campo de entrada
    const resultDiv = document.getElementById('factorialResult');        // Div para mostrar resultado
    const calculationDiv = document.getElementById('factorialCalculation'); // Div para mostrar proceso
    const valueDiv = document.getElementById('factorialValue');          // Div para mostrar valor final

    // Convertir el valor de entrada a número entero
    const number = parseInt(numberInput.value);

    // ========== VALIDACIONES ==========

    // Validación 1: Verificar que sea un número válido y positivo
    if (isNaN(number) || number < 0) {
        alert('Por favor, ingrese un número entero positivo válido.');
        return;
    }

    // Validación 2: Limitar el tamaño para evitar desbordamiento de JavaScript
    if (number > 170) {
        alert('El número es demasiado grande. Por favor, ingrese un número menor o igual a 170.');
        return;
    }

    try {
        // Calcular el factorial usando nuestra función
        const factorial = calculateFactorial(number);

        // Mostrar el proceso de cálculo paso a paso
        calculationDiv.innerHTML = `
            <p><strong>Cálculo:</strong> ${number}! = ${factorial.calculation}</p>
        `;

        // Mostrar el resultado final formateado con comas
        valueDiv.textContent = formatNumber(factorial.result);

        // Hacer visible la sección de resultados
        resultDiv.style.display = 'block';

        // Desplazarse suavemente hacia el resultado
        resultDiv.scrollIntoView({ behavior: 'smooth' });

    } catch (error) {
        // Mostrar mensaje de error si algo sale mal
        alert('Error: ' + error.message);
    }
});

// ==================== TABLA DE AMORTIZACIÓN ====================

/**
 * Función para calcular la tabla de amortización usando el método "Cuota sobre Saldos"
 */
function calculateAmortizationTable(amount, term, interestRate) {
    const monthlyRate = interestRate / 100;        // Convertir porcentaje a decimal
    const principalPayment = amount / term;        // Abono constante (capital)
    const table = [];                              // Array para almacenar la tabla
    let currentBalance = amount;                   // Saldo actual (empieza con el monto total)
    let totalInterest = 0;                         // Acumulador de intereses totales

    // Generar cada período de la tabla
    for (let period = 1; period <= term; period++) {
        // Calcular intereses sobre el saldo actual
        const interest = currentBalance * monthlyRate;

        // El pago total es la suma de intereses + abono
        const totalPayment = interest + principalPayment;

        // El nuevo saldo es el saldo actual menos el abono
        const newBalance = currentBalance - principalPayment;

        // Agregar fila a la tabla
        table.push({
            period: period,           // Número de período
            balance: currentBalance,  // Saldo al inicio del período
            interest: interest,       // Intereses del período
            principal: principalPayment, // Abono al capital
            payment: totalPayment     // Pago total del período
        });

        // Actualizar acumuladores
        totalInterest += interest;    // Sumar intereses al total
        currentBalance = newBalance;  // Actualizar saldo para el siguiente período
    }

    // Retornar la tabla completa y los totales
    return {
        table: table,                           // Tabla de amortización
        totalInterest: totalInterest,           // Total de intereses pagados
        totalAmount: amount + totalInterest     // Monto total pagado (capital + intereses)
    };
}

/**
 * Función para formatear números como moneda guatemalteca (Quetzales)
 */
function formatCurrency(amount) {
    return new Intl.NumberFormat('es-GT', {
        style: 'currency',           // Formato de moneda
        currency: 'GTQ',             // Moneda: Quetzal Guatemalteco
        minimumFractionDigits: 2     // Siempre mostrar 2 decimales
    }).format(amount);
}

/**
 * Función para mostrar la tabla de amortización en el HTML
 */
function displayAmortizationTable(data) {
    // Obtener referencia al cuerpo de la tabla
    const tableBody = document.getElementById('amortizationTableBody');
    tableBody.innerHTML = '';  // Limpiar contenido anterior

    // Crear una fila para cada período de la tabla
    data.table.forEach(row => {
        const tr = document.createElement('tr');  // Crear elemento de fila

        // Llenar la fila con los datos del período
        tr.innerHTML = `
            <td><strong>${row.period}</strong></td>                                    <!-- Número de período -->
            <td>${formatCurrency(row.balance)}</td>                                    <!-- Saldo pendiente -->
            <td>${formatCurrency(row.interest)}</td>                                   <!-- Intereses del período -->
            <td><strong>${formatCurrency(row.principal)}</strong></td>                 <!-- Abono al capital -->
            <td><strong class="text-primary">${formatCurrency(row.payment)}</strong></td> <!-- Pago total -->
        `;

        // Agregar la fila a la tabla
        tableBody.appendChild(tr);
    });

    // Agregar fila de totales al final
    const totalRow = document.createElement('tr');
    totalRow.className = 'table-info fw-bold';  // Aplicar estilos especiales

    // Llenar la fila de totales
    totalRow.innerHTML = `
        <td><strong>TOTAL</strong></td>                                                                    <!-- Etiqueta -->
        <td>-</td>                                                                                        <!-- Sin saldo (ya pagado) -->
        <td><strong>${formatCurrency(data.totalInterest)}</strong></td>                                    <!-- Total de intereses -->
        <td><strong>${formatCurrency(data.table[0].principal * data.table.length)}</strong></td>          <!-- Total de capital -->
        <td><strong class="text-success">${formatCurrency(data.totalAmount)}</strong></td>                <!-- Monto total pagado -->
    `;

    // Agregar la fila de totales a la tabla
    tableBody.appendChild(totalRow);
}

/**
 * Función para mostrar el resumen del préstamo en las tarjetas de información
 */
function displayLoanSummary(amount, term, rate, totalInterest) {
    // Actualizar cada elemento del resumen con los datos formateados
    document.getElementById('summaryAmount').textContent = formatCurrency(amount);        // Monto del préstamo
    document.getElementById('summaryTerm').textContent = `${term} meses`;                 // Plazo
    document.getElementById('summaryRate').textContent = `${rate}%`;                      // Tasa de interés
    document.getElementById('summaryTotalInterest').textContent = formatCurrency(totalInterest); // Total de intereses
}

/**
 * Event Listener para el formulario de tabla de amortización
 * Se ejecuta cuando el usuario envía el formulario (hace clic en "Generar Tabla")
 */
document.getElementById('amortizationForm').addEventListener('submit', function (e) {
    e.preventDefault();  // Prevenir el comportamiento por defecto del formulario

    // Obtener y convertir los valores de los campos del formulario
    const amount = parseFloat(document.getElementById('loanAmount').value);    // Monto del préstamo
    const term = parseInt(document.getElementById('loanTerm').value);          // Plazo en meses
    const rate = parseFloat(document.getElementById('interestRate').value);    // Tasa de interés mensual

    // ========== VALIDACIONES ==========

    // Validación 1: Verificar que el monto sea válido y mayor a 0
    if (isNaN(amount) || amount <= 0) {
        alert('Por favor, ingrese un monto válido mayor a 0.');
        return;
    }

    // Validación 2: Verificar que el plazo sea válido (entre 1 y 360 meses)
    if (isNaN(term) || term <= 0 || term > 360) {
        alert('Por favor, ingrese un plazo válido entre 1 y 360 meses.');
        return;
    }

    // Validación 3: Verificar que la tasa de interés sea válida (entre 0% y 100%)
    if (isNaN(rate) || rate < 0 || rate > 100) {
        alert('Por favor, ingrese una tasa de interés válida entre 0% y 100%.');
        return;
    }

    try {
        // Calcular la tabla de amortización usando nuestra función
        const amortizationData = calculateAmortizationTable(amount, term, rate);

        // Mostrar el resumen del préstamo
        displayLoanSummary(amount, term, rate, amortizationData.totalInterest);
        document.getElementById('loanSummary').style.display = 'block';

        // Mostrar la tabla de amortización completa
        displayAmortizationTable(amortizationData);
        document.getElementById('amortizationTable').style.display = 'block';

        // Desplazarse suavemente hacia los resultados
        document.getElementById('loanSummary').scrollIntoView({ behavior: 'smooth' });

    } catch (error) {
        // Mostrar mensaje de error si algo sale mal
        alert('Error al calcular la tabla de amortización: ' + error.message);
    }
});

// ==================== FUNCIONES DE UTILIDAD ====================

/**
 * Función para limpiar formularios y ocultar resultados
 */
function clearForm(formId) {
    // Limpiar todos los campos del formulario
    document.getElementById(formId).reset();

    // Ocultar todos los elementos de resultados relacionados
    const resultElements = document.querySelectorAll(`#${formId.replace('Form', '')}Result, #${formId.replace('Form', '')}Table, #${formId.replace('Form', '')}Summary`);
    resultElements.forEach(element => {
        if (element) element.style.display = 'none';
    });
}

/**
 * Event Listener que se ejecuta cuando el DOM está completamente cargado
 * Configura funcionalidades adicionales como limpieza automática y atajos de teclado
 */
document.addEventListener('DOMContentLoaded', function () {
    // ========== FUNCIONALIDAD DE LIMPIEZA AUTOMÁTICA ==========

    // Limpieza automática para el formulario de factorial
    const factorialForm = document.getElementById('factorialForm');
    const factorialInput = document.getElementById('factorialNumber');

    // Ocultar resultados cuando el campo se vacía
    factorialInput.addEventListener('input', function () {
        if (this.value === '') {
            document.getElementById('factorialResult').style.display = 'none';
        }
    });

    // Limpieza automática para el formulario de amortización
    const amortizationForm = document.getElementById('amortizationForm');
    const amortizationInputs = ['loanAmount', 'loanTerm', 'interestRate'];

    // Ocultar resultados cuando cualquier campo se vacía
    amortizationInputs.forEach(inputId => {
        document.getElementById(inputId).addEventListener('input', function () {
            if (this.value === '') {
                document.getElementById('loanSummary').style.display = 'none';
                document.getElementById('amortizationTable').style.display = 'none';
            }
        });
    });

    // ========== ATAJOS DE TECLADO ==========

    // Configurar atajos de teclado globales
    document.addEventListener('keydown', function (e) {
        // Ctrl + Enter: Enviar formulario activo
        if (e.ctrlKey && e.key === 'Enter') {
            const activeTab = document.querySelector('.nav-link.active');
            if (activeTab) {
                if (activeTab.id === 'factorial-tab') {
                    // Enviar formulario de factorial
                    document.getElementById('factorialForm').dispatchEvent(new Event('submit'));
                } else if (activeTab.id === 'amortization-tab') {
                    // Enviar formulario de amortización
                    document.getElementById('amortizationForm').dispatchEvent(new Event('submit'));
                }
            }
        }

        // Escape: Limpiar formulario activo
        if (e.key === 'Escape') {
            const activeTab = document.querySelector('.nav-link.active');
            if (activeTab) {
                if (activeTab.id === 'factorial-tab') {
                    // Limpiar formulario de factorial
                    clearForm('factorialForm');
                } else if (activeTab.id === 'amortization-tab') {
                    // Limpiar formulario de amortización
                    clearForm('amortizationForm');
                }
            }
        }
    });
});

/**
 * Configuración adicional de la interfaz de usuario
 * Inicializa tooltips y ayuda contextual para los campos de entrada
 */
document.addEventListener('DOMContentLoaded', function () {
    // ========== INICIALIZACIÓN DE TOOLTIPS ==========

    // Inicializar tooltips de Bootstrap si existen
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // ========== AYUDA CONTEXTUAL EN CAMPOS ==========

    // Mostrar ejemplos cuando el usuario hace foco en los campos
    document.getElementById('factorialNumber').addEventListener('focus', function () {
        if (this.value === '') {
            this.placeholder = 'Ejemplo: 5 (resultado: 120)';
        }
    });

    document.getElementById('loanAmount').addEventListener('focus', function () {
        if (this.value === '') {
            this.placeholder = 'Ejemplo: 10000';
        }
    });

    document.getElementById('loanTerm').addEventListener('focus', function () {
        if (this.value === '') {
            this.placeholder = 'Ejemplo: 6';
        }
    });

    document.getElementById('interestRate').addEventListener('focus', function () {
        if (this.value === '') {
            this.placeholder = 'Ejemplo: 1.5';
        }
    });
});