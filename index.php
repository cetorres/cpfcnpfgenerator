<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Gerador de CPF e CNPJ Válidos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Carlos Eugênio Torres">
<meta name="title" content="Gerador de CPF e CNPJ Válidos">
<meta name="description" content="Gerador de CPF e CNPJ Válidos. Desenvolvido apenas para fins educacionais.">
<meta name="keyword" content="cpf cnpj gerador automatico">
<script type="text/javascript">
//<!--
// *************************************************
// Script Gerador de CPF e CNPJ Válidos
// Autor: Carlos Eugênio Torres
// Email: cetorres@cetorres.com
// Website: http://www.cetorres.com
// Data 1a. versão: 13/01/2003
// Data última atualização: 27/04/2004
// *************************************************
// Proibida a cópia de qualquer parte deste
// script sem manter este aviso e os dados
// do autor. Use com responsabilidade.
// *************************************************

// Variável global para dizer se o CPF/CNPJ será pontuado ou não
var pontuado;

// Função para gerar números randômicos
function gera_random(n)
{
    var ranNum = Math.round(Math.random()*n);
    return ranNum;
}

// Função para retornar o resto da divisao entre números (mod)
function mod(dividendo,divisor) 
{
	return Math.round(dividendo - (Math.floor(dividendo/divisor)*divisor));
}

// Função que gera números de CPF válidos
function cpf()
{
	var n = 9;
	var n1 = gera_random(n);
 	var n2 = gera_random(n);
 	var n3 = gera_random(n);
 	var n4 = gera_random(n);
 	var n5 = gera_random(n);
 	var n6 = gera_random(n);
 	var n7 = gera_random(n);
 	var n8 = gera_random(n);
 	var n9 = gera_random(n);
 	var d1 = n9*2+n8*3+n7*4+n6*5+n5*6+n4*7+n3*8+n2*9+n1*10;
 	d1 = 11 - ( mod(d1,11) );
 	if (d1>=10) d1 = 0;
 	var d2 = d1*2+n9*3+n8*4+n7*5+n6*6+n5*7+n4*8+n3*9+n2*10+n1*11;
 	d2 = 11 - ( mod(d2,11) );
 	if (d2>=10) d2 = 0;
	retorno = '';
	if (pontuado) retorno = ''+n1+n2+n3+'.'+n4+n5+n6+'.'+n7+n8+n9+'-'+d1+d2;
	else retorno = ''+n1+n2+n3+n4+n5+n6+n7+n8+n9+d1+d2;
 	return retorno;
}

// Função que gera números de CNPJ válidos
function cnpj()
{
	var n = 9;
	var n1  = gera_random(n);
 	var n2  = gera_random(n);
 	var n3  = gera_random(n);
 	var n4  = gera_random(n);
 	var n5  = gera_random(n);
 	var n6  = gera_random(n);
 	var n7  = gera_random(n);
 	var n8  = gera_random(n);
 	var n9  = 0; //gera_random(n);
 	var n10 = 0; //gera_random(n);
 	var n11 = 0; //gera_random(n);	
 	var n12 = 1; //gera_random(n);		
	var d1 = n12*2+n11*3+n10*4+n9*5+n8*6+n7*7+n6*8+n5*9+n4*2+n3*3+n2*4+n1*5;
 	d1 = 11 - ( mod(d1,11) );
 	if (d1>=10) d1 = 0;
 	var d2 = d1*2+n12*3+n11*4+n10*5+n9*6+n8*7+n7*8+n6*9+n5*2+n4*3+n3*4+n2*5+n1*6;
 	d2 = 11 - ( mod(d2,11) );
 	if (d2>=10) d2 = 0;
	retorno = '';
	if (pontuado) retorno = ''+n1+n2+'.'+n3+n4+n5+'.'+n6+n7+n8+'/'+n9+n10+n11+n12+'-'+d1+d2;
	else retorno = ''+n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+d1+d2;
 	return retorno;
}

// Função para escolher qual função chamar de acordo com a chamada
function faz()
{
	if (document.form1.tipo[0].checked)
		document.form1.numero.value = cpf();
	else
		document.form1.numero.value = cnpj();
}

// Função para alterar o formato do CPF/CNPJ para pontuado ou não
function pontuacao()
{
	if (document.form1.ck_pontos.checked)
		pontuado = true;
	else
		pontuado = false;

	mudaTamanhoCaixa();
}

// Função para mudar o tamanho da caixa de texto
function mudaTamanhoCaixa()
{
	if (document.form1.tipo[0].checked)
	{
		if (pontuado) document.form1.numero.size = 16;
		else document.form1.numero.size = 12;
	}
	else
	{
		if (pontuado) document.form1.numero.size = 20;
		else document.form1.numero.size = 16;
	}

	document.form1.numero.value = '';
}

// FIM -->
</script>
</head>

<body bgcolor="#FFFFFF" onload="pontuacao()">
	<form name="form1" method="post" action="">
	  <table width="261" border="0" align="center" cellpadding="0" cellspacing="2">
	    <tr align="center"> 
	      <td colspan="2" bgcolor="#003399"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Gerador 
	        de CPF e CNPJ V&aacute;lidos</strong></font></td>
	    </tr>
	    <tr> 
	      <td colspan="2" align="center" bgcolor="#CCCCCC"><input name="numero" type="text" id="numero" size="12" readonly></td>
	    </tr>
	    <tr> 
		  <td align="center" bgcolor="#CCCCCC">
			<font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
			 <input id="ck_pontos" name="ck_pontos" type="checkbox" value="1" checked onclick="pontuacao()"><label for="ck_pontos">Pontuação</label>
			</font>
		  </td>
	      <td align="center" bgcolor="#CCCCCC">
		    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
	        <input id="rd_cpf" name="tipo" type="radio" value="cpf" checked onclick="mudaTamanhoCaixa()"><label for="rd_cpf">CPF</label> 
	        <input id="rd_cnpj" type="radio" name="tipo" value="cnpj" onclick="mudaTamanhoCaixa()"><label for="rd_cnpj">CNPJ</label>
			</font>
		  </td>
	    </tr>
		<tr>
	      <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="button" name="Button" value="Gerar" onClick="faz()"></td>
	    </tr>
	  </table>
	</form>
	<br />
	<div style="text-align:center;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:10px">
		&copy; 2003 - <?=Date("Y")?> por Carlos Eugênio Torres<br><br>
		<b>Contatos</b><br>
		<a style="color:#000000" href="mailto:cetorres@cetorres.com" title="Envie-me um e-mail">cetorres@cetorres.com</a><br>
		<a style="color:#000000" href="http://www.cetorres.com" target="_blank" title="Entre no meu website">http://www.cetorres.com</a>
	</div>
	<br />
	<div style="text-align:center">
		<script type="text/javascript"><!--
		google_ad_client = "ca-pub-6671721013404297";
		google_ad_slot = "3577256354";
		google_ad_width = 728;
		google_ad_height = 90;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
	</div>
</body>
</html>
