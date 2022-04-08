$(document).ready(function() {
    $('#cpf').mask ('000.000.000-00');
    $('#cns').mask ('000.0000.0000.0000');
    $('#phone').mask ('(00) 0000-0000');
    $('#cellphone').mask ('(00) 00000-0000');
    $('#cep').mask ('00.000-000');
});

$('body').keyup(function(e){
    if(e.key == 'Escape'){
        loadList();
    }
});

$('body').focus(function(e){
    if(e.key == 'Escape'){
        loadList();
    }
});

$(document).ready(function() {
    $('#myBtn').on('click', function() {
        var visivel  = $('#div-float').is(':visible');
        if (visivel) $('#div-float').hide();
        else $('#div-float').show();
    });
});

$(document).ready(function() {
    $('#form').bind("keypress", function(e) {
        if (e.key == 'Enter') {
            e.preventDefault();

            if (document.getElementById('div-table') == document.activeElement) {
                tableForm();
            }
        }
    });
});

var globalCount = 1;
var allMeds = [];
var allUsages = [];
var allQuantities = [];
var textToInput = [];


function tableForm() {
    table = resetTable();

    if (allMeds.length === 0) {

        createInputs();

    } else {

        loadList();

        createInputs();
    }
}

function resetTable() {
    var tableBody = document.getElementById('table-body');
    tableBody.innerHTML = "";

    return tableBody;
}

function createUsageInput() {
    var tr = document.createElement('tr');
    var inputUsage = document.createElement('input');
    inputUsage.classList.add('input-table');
    inputUsage.setAttribute('style', 'width: 100%;')

    var tdUsage = document.createElement('td');
    tdUsage.colSpan = 4;
    
    var tdAlign = document.createElement('td');
    tdAlign.innerHTML = ">>";

    tdUsage.appendChild(inputUsage);

    tr.appendChild(tdAlign);
    tr.appendChild(tdUsage);

    table.appendChild(tr);
    
    inputUsage.focus();

    inputUsage.addEventListener('input', function (event) {
        event.target.value = event.target.value.toUpperCase();
    });

    inputUsage.addEventListener('keyup', function (event) {
        if (event.key === 'Enter' && event.target.value.length !== 0) {
            saveMedicinUsage(event.target.value);
        }
    });
}

function saveMedicinUsage(lineUsage) {
    allUsages.push(lineUsage);
    textToInput.push(lineUsage);
    loadList();
    tableForm();
    document.getElementById('medicins').value = textToInput;
}

function createInputs() {

    var tr = document.createElement('tr');

    var inputMed = document.createElement('input');
    inputMed.classList.add('input-table');
    inputMed.id = "med-input";

    var inputQuant = document.createElement('input');
    inputQuant.id = "input-table";
    inputQuant.classList.add('input-table');

    var button = document.createElement('a');
    button.id = "del-medicament";
    button.addEventListener('click', function() { loadList(); });
    button.innerHTML = '<span class="glyphicon glyphicon-minus"></span>';

    var tdIncrement = document.createElement('td');
    var tdMed = document.createElement('td');
    var tdSpacer = document.createElement('td');
    var tdQuant = document.createElement('td');
    var tdAction = document.createElement('td');

    tdIncrement.innerHTML = globalCount;
    tdMed.appendChild(inputMed);
    tdSpacer.innerHTML = "-------------------";
    tdQuant.appendChild(inputQuant);
    tdAction.appendChild(button);

    tr.appendChild(tdIncrement);
    tr.appendChild(tdMed);
    tr.appendChild(tdSpacer);
    tr.appendChild(tdQuant);
    tr.appendChild(tdAction);

    table.appendChild(tr);
    inputMed.focus();

    inputMed.addEventListener('input', function (event) {
        event.target.value = event.target.value.toTitle();
    });

    inputQuant.addEventListener('input', function (event) {
        event.target.value = event.target.value.toUpperCase();
    });

    inputQuant.addEventListener('keyup', function (event) {
        if (event.key === 'Enter' && event.target.value.length !== 0 && inputMed.value.length !== 0) {
            saveCache(inputMed.value, inputQuant.value);
        }
    });
}

String.prototype.toTitle = function() {
    return this.replace(/(^|\s)\S/g, function(t) { return t.toUpperCase() });
}

function delItem(button) {
    var id = button.id.substr(-1);
    id --;
    allMeds.splice(id, 1);
    allQuantities.splice(id, 1);
    allUsages.splice(id, 1);
    textToInput.splice(id > 0 ? id+2 : id, 3);
    globalCount --;
    loadList();
    document.getElementById('medicins').value = textToInput;
}

function saveCache(lineMed, lineQuant) {
    globalCount ++;
    allMeds.push(lineMed);
    allQuantities.push(lineQuant);
    textToInput.push(lineMed);
    textToInput.push(lineQuant);
    console.log(textToInput);
    loadList();
    createUsageInput();
}

function loadUsages(index) {

    if (allUsages.length == 0) return;

    if (allUsages.length <= index - 1) return;

    var tr = document.createElement('tr');

    var tdUsage = document.createElement('td');
    tdUsage.name = 'usage';
    tdUsage.colSpan = 4;

    var tdAlign = document.createElement('td');

    tdAlign.innerHTML = ">>";
    tdUsage.innerHTML = allUsages[index-1];

    tr.appendChild(tdAlign);
    tr.appendChild(tdUsage);

    table.appendChild(tr);
}

function loadList() {

    table = resetTable();

    for (var i = 1; i < allMeds.length + 1; i++) {

        var tr = document.createElement('tr');

        var tdIncrement = document.createElement('td');
        var tdMed = document.createElement('td');
        tdMed.name = 'medicament';
        var tdSpacer = document.createElement('td');
        var tdQuant = document.createElement('td');
        tdQuant.name = 'quant';
        var tdAction = document.createElement('td');

        var button = document.createElement('a');
        button.id = "del-medicament" + i.toString();
        button.onclick = function() {
            delItem(this);
        }
        button.innerHTML = '<span class="glyphicon glyphicon-minus"></span>';

        tdIncrement.innerHTML = i;
        tdMed.innerHTML = allMeds[i-1];
        tdSpacer.innerHTML = "-------------------";
        tdQuant.innerHTML = allQuantities[i-1];
        tdAction.appendChild(button);

        tr.appendChild(tdIncrement);
        tr.appendChild(tdMed);
        tr.appendChild(tdSpacer);
        tr.appendChild(tdQuant);
        tr.appendChild(tdAction);

        table.appendChild(tr);

        loadUsages(i);
    }

    document.getElementById('div-table').focus();
}

var lastItem = "";

function getCurrentExclude(name, id) {

    document.getElementById('modal-text').innerHTML = "Excluir Cadastro de " + name;
    var form = document.getElementById('exclude-btn');

    if (lastItem == "") {
        form.action = form.action.replace('/id', '/' + id);
    } else {
        form.action = form.action.replace(lastItem, id);
    }

    lastItem = id;
}

function toUpperFunc(event) {
    event.target.value = event.target.value.toUpperCase();
}
