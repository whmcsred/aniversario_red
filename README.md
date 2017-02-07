# Aniversário RED
O Aniversário RED é um HOOK destinado a WHMCS para poder fazer envio de e-mail aos aniversariante(s), utilizando o sistema de CronJob do próprio WHMCS. <br/>

# Requisitos para funcionamento
Para funcionar você deverá ter:<br/> 
- WHMCS 6 ou superior<br/>
- PHP 5.6 ou superior<br/>
- PDO e Mysqli instalados<br/>
- Campo Personalizado de Data de Nascismento com Mascará (00/00/0000).

# Como instalar
Para instalar o Aniversário RED você deverá baixar o arquivo "aniversario_red.php" e envia-lo para o caminho: /includes/hooks/<br/>
Agora você deverá configurar ele, para isso edite o arquivo e edite as seguintes linhas:
- Linha 15: "$camponascimento" especifique o ID do campo de data de nascimento, caso não tenha lembre-se de criar um campo personalizado em seu WHMCS e após isso verifique qual é o ID do FIELD, lembre-se não é a posição do campo e sim o ID FIELD, caso queira descobrir acesse a página de registro de usuários abra o código fonte e pesquise pelo campo ele deverá estar no seguinte formado ustomfield[ID].<br/>
- Linha 17: "$mensagem" coloque o nome único do e-mail criado no seu whmcs para esta finalidade, lembre-se de colocar exatamente o nome único que você atribuiu a ele na criação.<br/>
- Linha 19: "$admin" neste campo você deverá especificar o usuário que você usa para logar em seu WHMCS, para atribuir o envio ao usuário (é necessário por conta da LocalAPI).

# Considerações
Espero que seja útil para seu dia a dia, caso tenha dúvidas convido a conhecer nosso fórum também: http://forum.whmcs.red<br/>
Caso desejar conhecer novos módulos, notícias e tutoriais acesse: http://whmcs.red<br/>

Módulo desenvolvido por Luciano Zanita - WHMCS.RED
