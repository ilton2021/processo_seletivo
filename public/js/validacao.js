function validar(valor) {
    var valida = true;
    // Aba 1: INFORMAÇÃO CANDIDATURA

    var x = document.getElementById('como_soube').value;
    var y = document.getElementById('como_soube2').value;    
    if(x == "") {
        $('.nav-tabs a[href="#tabs1"]').tab('show');
        alert('Informe Como você soube da Vaga!'); 
        valida = false;
    } else if (x == "outros" && y == "") {
        $('.nav-tabs a[href="#tabs1"]').tab('show');
        alert('Informe Como você soube da Vaga!');
        valida = false;
    }

    if(valida) {
        var x = document.getElementById('parentesco').value;
        var y = document.getElementById('parentesco_nome').value;
        if(x == "") {
            $('.nav-tabs a[href="#tabs1"]').tab('show');
            alert('Informe se você foi indicado!');
            valoresCampos();
            valida = false;
        } else if (x == "sim" && y == "") {
            $('.nav-tabs a[href="#tabs1"]').tab('show');
            alert('Informe se você foi indicado!');
            valida = false;
        }
    } else { valoresCampos(); }
    
    if(valida) {
        var x = document.getElementById('trabalha_oss').value;
        var y = document.getElementById('trabalha_oss2').value;
        if(x == "") {
            $('.nav-tabs a[href="#tabs1"]').tab('show');
            alert('Informe se você trabalha/trabalhou em alguma unidade do HCP Gestão!');
            valida = false;
            valoresCampos();
        } else if (x == "sim" && y == "") {
            $('.nav-tabs a[href="#tabs1"]').tab('show');
            alert('Informe em qual unidade você trabalha ou trabalhou!');
            valida = false;
        }
    } else { valoresCampos(); }
    
    // Aba1: DIVERSIDADE

    if(valida) {
        var x1 = document.getElementById('nome_social').value;
        var x2 = document.getElementById('pronome').value;
        var x3 = document.getElementById('genero').value;
        var x4 = document.getElementById('cor').value;
        var x5 = document.getElementById('aceito').value;
    
        if(x1 == "" || x1 == " ") {
            $('.nav-tabs a[href="#tabs1"]').tab('show');
            alert('Informe seu nome social!');
            valida = false;
        } else if(x2 == "" || x2 == "0") {
            $('.nav-tabs a[href="#tabs1"]').tab('show');
            alert('Informe seu pronome!');
            valida = false;
        } else if(x3 == "" || x3 == "0") {
            $('.nav-tabs a[href="#tabs1"]').tab('show');
            alert('Informe seu gênero!');
            valida = false;
        } else if(x4 == "" || x4 == "0") {
            $('.nav-tabs a[href="#tabs1"]').tab('show');
            alert('Informe sua cor!');
            valida = false;
        } else if(x5 == "" || x5 == "0") {
            $('.nav-tabs a[href="#tabs1"]').tab('show');
            alert('Informe se você concorda em compartilhar as informações!');
            valida = false;
        }
    } else { valoresCampos(); }
    
    // Aba 2: DADOS PESSOAIS

    if(valida) {
        var x1 = document.getElementById('nome').value;
        var x2 = document.getElementById('email').value;
        var x3 = document.getElementById('cpf').value;
        var x4 = document.getElementById('vaga').value;
        var x5 = document.getElementById('telefone').value;
        
        if(x1 == "" || x1 == " ") {
            $('.nav-tabs a[href="#tabs2"]').tab('show');
            alert('Informe o seu nome completo!');
            valida = false;
        } else if(x2 == "" || x2 == " ") {
            $('.nav-tabs a[href="#tabs2"]').tab('show');
            alert('Informe o seu e-mail!');
            valida = false;
        } else if(x3 == "" || x3 == " ") {
            $('.nav-tabs a[href="#tabs2"]').tab('show');
            alert('Informe o seu cpf!');
            valida = false;
        } else if(x4 == "" || x4 == "0") {
            $('.nav-tabs a[href="#tabs2"]').tab('show');
            alert('Informe a sua vaga!');
            valida = false;
        } else if(x5 == "" || x5 == " ") {
            $('.nav-tabs a[href="#tabs2"]').tab('show');
            alert('Informe o seu telefone!');
            valida = false;
        }
    } else { valoresCampos(); }
    
    // Aba 2: NATURALIDADE

    if(valida) {
        var x1 = document.getElementById('lugar_nascimento').value;
        var x2 = document.getElementById('estado_nascimento').value;
        var x3 = document.getElementById('cidade_nascimento').value;
        var x4 = document.getElementById('data_nascimento').value;
        
        if(x1 == "" || x1 == " ") {
            $('.nav-tabs a[href="#tabs2"]').tab('show');
            alert('Informe a sua cidade de nascimento!');
            valida = false;
        } else if(x2 == "" || x2 == " ") {
            $('.nav-tabs a[href="#tabs2"]').tab('show');
            alert('Informe o seu estado de nascimento!');
            valida = false;
        } else if(x3 == "" || x3 == " ") {
            $('.nav-tabs a[href="#tabs2"]').tab('show');
            alert('Informe o seu país de nascimento!');
            valida = false;
        } else if(x4 == "") {
            $('.nav-tabs a[href="#tabs2"]').tab('show');
            alert('Informe a sua data de nascimento!');
            valida = false;
        }
    } else { valoresCampos(); }
    
    // Aba 3: ENDEREÇO

    if(valida) {
        var x1 = document.getElementById('cep').value;
        var x2 = document.getElementById('rua').value;
        var x3 = document.getElementById('numero').value;
        var x4 = document.getElementById('bairro').value;
        var x5 = document.getElementById('cidade').value;
        var x6 = document.getElementById('estado').value;
    
        if(x1 == "" || x1 == " ") {
            $('.nav-tabs a[href="#tabs3"]').tab('show');
            alert('Informe o seu cep!');
            valida = false;
        } else if(x2 == "" || x2 == " ") {
            $('.nav-tabs a[href="#tabs3"]').tab('show');
            alert('Informe a sua rua!');
            valida = false;
        } else if(x3 == "" || x3 == " ") {
            $('.nav-tabs a[href="#tabs3"]').tab('show');
            alert('Informe o número da sua residência!');
            valida = false;
        } else if(x4 == "" || x4 == " ") {
            $('.nav-tabs a[href="#tabs3"]').tab('show');
            alert('Informe o seu bairro!');
            valida = false;
        } else if(x5 == "" || x5 == " ") {
            $('.nav-tabs a[href="#tabs3"]').tab('show');
            alert('Informe a sua cidade!');
            valida = false;
        } else if(x6 == "" || x6 == "0") {
            $('.nav-tabs a[href="#tabs3"]').tab('show');
            alert('Informe o seu estado!');
            valida = false;
        }
    }
    
    // Aba 3: ESCOLARIDADE

    if(valida) {
        var x1 = document.getElementById('escolaridade').value;
        var x2 = document.getElementById('status_escolaridade').value;
        var x3 = document.getElementById('formacao').value;
        var x4 = document.getElementById('cursos').value;
        if(x1 == "" || x1 == "0") {
            $('.nav-tabs a[href="#tabs3"]').tab('show');
            alert('Informe a sua escolaridade!');
            valida = false;
        } else if(x2 == "" || x2 == "0") {
            $('.nav-tabs a[href="#tabs3"]').tab('show');
            alert('Informe o status da sua escolaridade!');
            valida = false;
        } else if(x3 == "" || x3 == " ") {
            $('.nav-tabs a[href="#tabs3"]').tab('show');
            alert('Informe a sua formação!');
            valida = false;
        } else if(x4 == "" || x4 == " ") {
            $('.nav-tabs a[href="#tabs3"]').tab('show');
            alert('Informe o(s) seu(s) curso(s) realizado(s)!');
            valida = false;
        }
    }
    
    // Aba 4: PCD

    if(valida) {
        var x = document.getElementById('deficiencia_status').value;
        var y = document.getElementById('deficiencia').value;
        var z = document.getElementById('cid').value;
        var t = document.getElementById('arquivo_deficiencia').value;
        var h = document.getElementById('arquivo_deficiencia_').value;
        
        if(x == "") {
            $('.nav-tabs a[href="#tabs4"]').tab('show');
            alert('Informe se você quer se candidatar para vaga de PCD!');
            valida = false;
        } else if (x == "sim" && y == "") {
            $('.nav-tabs a[href="#tabs4"]').tab('show');
            alert('Informe seu tipo de PCD!');
            valida = false;
        } else if (x == "sim" && z == "") {
            $('.nav-tabs a[href="#tabs4"]').tab('show');
            alert('Informe seu CID da PCD!');
            valida = false;
        } else if (x == "sim" && h == "") {
            if(x == "sim" && t == "") {
                $('.nav-tabs a[href="#tabs4"]').tab('show');
                alert('Informe o laudo médico da PCD!');
                valida = false;
            }
        }
    }

    // Aba 5: EXPERIÊNCIAS

    if(valida) {
        var x = document.getElementById('val6').checked;
        if(x == true) {
            var empresa1 = document.getElementById('empresa').value;
            var cargo1   = document.getElementById('cargo').value;
            var data_in1 = document.getElementById('data_inicio').value;
            var data_fi1 = document.getElementById('data_fim').value;
            var atrib1   = document.getElementById('atribuicao').value;
            var ctps1    = document.getElementById('arquivo_ctps1').value;
            var ctps1_   = document.getElementById('arquivo_ctps1_').value;
    
            if(empresa1 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe o nome da empresa da 1º experiência!');
                valida = false;
            } else if(cargo1 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe o nome do cargo da 1º experiência!');
                valida = false;
            } else if(data_in1 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe a data início da 1º experiência!');
                valida = false;
            } else if(data_fi1 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe a data fim da 1º experiência!');
                valida = false;
            } else if(atrib1 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe a sua atribuição da 1º experiência!');
                valida = false;
            } else if(ctps1_ == "") {
                if(ctps1 == "") {
                    $('.nav-tabs a[href="#tabs5"]').tab('show');
                    alert('Informe o arquivo CTPS da 1º Experiência!');
                    valida = false;
                }
            }
        }

        var x = document.getElementById('val7').checked;
        if(x == true) {
            var empresa2 = document.getElementById('empresa2').value;
            var cargo2   = document.getElementById('cargo2').value;
            var data_in2 = document.getElementById('data_inicio2').value;
            var data_fi2 = document.getElementById('data_fim2').value;
            var atrib2   = document.getElementById('atribuicao2').value;
            var ctps2    = document.getElementById('arquivo_ctps2').value;
            var ctps2_   = document.getElementById('arquivo_ctps2_').value;

            if(empresa2 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe o nome da empresa da 2º experiência!');
                valida = false;
            } else if(cargo2 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe o nome do cargo da 2º experiência!');
                valida = false;
            } else if(data_in2 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe a data início da 2º experiência!');
                valida = false;
            } else if(data_fi2 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe a data fim da 2º experiência!');
                valida = false;
            } else if(atrib2 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe a sua atribuição da 2º experiência!');
                valida = false;
            } else if(ctps2_ == "") {
                if(ctps2 == "") {
                    $('.nav-tabs a[href="#tabs5"]').tab('show');
                    alert('Informe o arquivo CTPS da 2º Experiência!');
                    valida = false;
                }
            }
        } else { valoresCampos(); }

        var x = document.getElementById('val8').checked;
        if(x == true) {
            var empresa3 = document.getElementById('empresa3').value;
            var cargo3   = document.getElementById('cargo3').value;
            var data_in3 = document.getElementById('data_inicio3').value;
            var data_fi3 = document.getElementById('data_fim3').value;
            var atrib3   = document.getElementById('atribuicao3').value;
            var ctps3    = document.getElementById('arquivo_ctps3').value;
            var ctps3_   = document.getElementById('arquivo_ctps3_').value;
    
            if(empresa3 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe o nome da empresa da 3º experiência!');
                valida = false;
            } else if(cargo3 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe o nome do cargo da 3º experiência!');
                valida = false;
            } else if(data_in3 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe a data início da 3º experiência!');
                valida = false;
            } else if(data_fi3 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe a data fim da 3º experiência!');
                valida = false;
            } else if(atrib3 == "") {
                $('.nav-tabs a[href="#tabs5"]').tab('show');
                alert('Informe a sua atribuição da 3º experiência!');
                valida = false;
            } else if(ctps3_ == "") {
                if(ctps3 == "") {
                    $('.nav-tabs a[href="#tabs5"]').tab('show');
                    alert('Informe o arquivo CTPS da 3º Experiência!');
                    valida = false;
                }
            }
        }  
    }
    
    // Aba 6: CURRÍCULO e DISPONIBILIDADE

    if(valida) {
        var x1  = document.getElementById('arquivo').value;
        var x2  = document.getElementById('foto').value;
        var x3  = document.getElementById('habilitacao').value;
        var x4  = document.getElementById('periodo').value;
        var x5  = document.getElementById('outra_cidade').value;
    
        if(x1 == "") {
            $('.nav-tabs a[href="#tabs6"]').tab('show');
            alert('Anexe o seu currículo!');
        } else if(x2 == "") {
            $('.nav-tabs a[href="#tabs6"]').tab('show');
            alert('Anexe a sua foto!');
        } else if(x3 == "") {
            $('.nav-tabs a[href="#tabs6"]').tab('show');
            alert('Informe se você possui habilitação!');
        } else if(x4 == "") {
            $('.nav-tabs a[href="#tabs6"]').tab('show');
            alert('Informe se tem disponibilidade de período!');
        } else if(x5 == "") {
            $('.nav-tabs a[href="#tabs6"]').tab('show');
            alert('Informe se tem disponibilidade de mudar de cidade!');
        }
    }
}

function valoresCampos() {
    
    if(document.getElementById('nome_social').value == "") {
        document.getElementById('nome_social').value = " ";
    }
    if(document.getElementById('pronome').value == "0") {
        document.getElementById('pronome').value = "0";
    }
    if(document.getElementById('genero').value == "0"){
        document.getElementById('genero').value = "0";
    }
    if(document.getElementById('cor').value == "0"){
        document.getElementById('cor').value = "0";
    }
    if(document.getElementById('nome').value == ""){
        document.getElementById('nome').value = " ";
    }
    if(document.getElementById('email').value == ""){
        document.getElementById('email').value = " ";
    }
    if(document.getElementById('cpf').value == ""){
        document.getElementById('cpf').value = " ";
    }
    if(document.getElementById('vaga').value == ""){
        document.getElementById('vaga').value = "0";
    }
    if(document.getElementById('telefone').value == ""){
        document.getElementById('telefone').value = " ";
    }
    if(document.getElementById('lugar_nascimento').value == ""){
        document.getElementById('lugar_nascimento').value = " ";
    }
    if(document.getElementById('estado_nascimento').value == ""){
        document.getElementById('estado_nascimento').value = "0";
    }
    if(document.getElementById('data_nascimento').value == ""){
        const hoje = new Date()
        const dia  = hoje.getDate().toString().padStart(2,'0')
        const mes  = String(hoje.getMonth() + 1).padStart(2,'0')
        const ano  = hoje.getFullYear()
        const dataAtual = `${ano}-${mes}-${dia}`
        document.getElementById('data_nascimento').value = dataAtual;
    }
    if(document.getElementById('cep').value == ""){
        document.getElementById('cep').value = " ";
    }
    if(document.getElementById('rua').value == ""){
        document.getElementById('rua').value = " ";
    }
    if(document.getElementById('numero').value == ""){
        document.getElementById('numero').value = " ";
    }
    if(document.getElementById('bairro').value == ""){
        document.getElementById('bairro').value = " ";
    }
    if(document.getElementById('cidade_nascimento').value == ""){
        document.getElementById('cidade_nascimento').value = " ";
    }
    if(document.getElementById('cidade').value == ""){
        document.getElementById('cidade').value = " ";
    }
    if(document.getElementById('formacao').value == ""){
        document.getElementById('formacao').value = " ";
    }
    if(document.getElementById('cursos').value == ""){
        document.getElementById('cursos').value = " ";
    }
    if(document.getElementById('empresa').value == "") {
        document.getElementById('empresa').value =  " ";
    }
    if(document.getElementById('cargo').value == "") {
        document.getElementById('cargo').value = " ";
    }
    if(document.getElementById('atribuicao').value == "") {
        document.getElementById('atribuicao').value = " ";
    }
    if(document.getElementById('data_inicio').value == ""){
        const hoje = new Date()
        const dia  = hoje.getDate().toString().padStart(2,'0')
        const mes  = String(hoje.getMonth() + 1).padStart(2,'0')
        const ano  = hoje.getFullYear()
        const dataAtual = `${ano}-${mes}-${dia}`
        document.getElementById('data_inicio').value = dataAtual;
    }
    if(document.getElementById('data_fim').value == ""){
        const hoje = new Date()
        const dia  = hoje.getDate().toString().padStart(2,'0')
        const mes  = String(hoje.getMonth() + 1).padStart(2,'0')
        const ano  = hoje.getFullYear()
        const dataAtual = `${ano}-${mes}-${dia}`
        document.getElementById('data_fim').value = dataAtual;
    }
    if(document.getElementById('empresa2').value == "") {
        document.getElementById('empresa2').value =  " ";
    }
    if(document.getElementById('cargo2').value == "") {
        document.getElementById('cargo2').value = " ";
    }
    if(document.getElementById('atribuicao2').value == "") {
        document.getElementById('atribuicao2').value = " ";
    }
    if(document.getElementById('data_inicio2').value == ""){
        const hoje = new Date()
        const dia  = hoje.getDate().toString().padStart(2,'0')
        const mes  = String(hoje.getMonth() + 1).padStart(2,'0')
        const ano  = hoje.getFullYear()
        const dataAtual = `${ano}-${mes}-${dia}`
        document.getElementById('data_inicio2').value = dataAtual;
    }
    if(document.getElementById('data_fim2').value == ""){
        const hoje = new Date()
        const dia  = hoje.getDate().toString().padStart(2,'0')
        const mes  = String(hoje.getMonth() + 1).padStart(2,'0')
        const ano  = hoje.getFullYear()
        const dataAtual = `${ano}-${mes}-${dia}`
        document.getElementById('data_fim2').value = dataAtual;
    }
    if(document.getElementById('empresa3').value == "") {
        document.getElementById('empresa3').value =  " ";
    }
    if(document.getElementById('cargo3').value == "") {
        document.getElementById('cargo3').value = " ";
    }
    if(document.getElementById('atribuicao3').value == "") {
        document.getElementById('atribuicao3').value = " ";
    }
    if(document.getElementById('data_inicio3').value == ""){
        const hoje = new Date()
        const dia  = hoje.getDate().toString().padStart(2,'0')
        const mes  = String(hoje.getMonth() + 1).padStart(2,'0')
        const ano  = hoje.getFullYear()
        const dataAtual = `${ano}-${mes}-${dia}`
        document.getElementById('data_inicio3').value = dataAtual;
    }
    if(document.getElementById('data_fim3').value == ""){
        const hoje = new Date()
        const dia  = hoje.getDate().toString().padStart(2,'0')
        const mes  = String(hoje.getMonth() + 1).padStart(2,'0')
        const ano  = hoje.getFullYear()
        const dataAtual = `${ano}-${mes}-${dia}`
        document.getElementById('data_fim3').value = dataAtual;
    }
}