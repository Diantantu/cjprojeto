<?php
include('classes/DB.php');
include('classes/Mensagens.php');
include('classes/Usuario.php');

session_start();
if( isset($_SESSION['nome_corrector'])){

}else
{
    header('Location: ./github/angoimoveis/index.php');
}

//Carregando mensagens e criando os objetos
$USUARIOS = [];
$sql_contactos = "SELECT usuario.id as id, usuario.nome as nome,
 usuario.sobrenome as sobrenome, conversa.mensagem, 
 conversa.data, conversa.visto FROM conversa
INNER JOIN usuario on conversa.cliente=usuario.id 
WHERE conversa.corretor=? ORDER BY conversa.id DESC";
$mensagens = DB::pesquisar($sql_contactos, [$_SESSION['id_corrector']]);

foreach($mensagens as $mensagem){
	if( array_key_exists($mensagem['id'],$USUARIOS))
	{
		$m = new Chats\Mensagens($mensagem['id'],$mensagem['nome'].' '.
			$mensagem['sobrenome'], $mensagem['mensagem'], $mensagem['data']);
		$USUARIOS[$mensagem['id']]->add_conversa($m);
	}else
	{//($id, $nome, $sobrenome, $conversas)
	
		$m = new Chats\Mensagens($mensagem['id'],$mensagem['id'].' '.$mensagem['nome'],
			$mensagem['mensagem'], $mensagem['data']);
		$u = new Chats\Usuario($mensagem['id'], $mensagem['nome'],
			$mensagem['sobrenome'], $m);
		$USUARIOS[$mensagem['id']] = $u;
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<!--Icons-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<!--css-->
		<link rel="stylesheet" href="css/message.css">
		
				<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
				<link rel="stylesheet" href="css/mdi/css/materialdesignicons.min.css">

		<!--bootstrap-->
		<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


	</head>

	<body>

	<a href="./Mensagens.php" id='botaovoltar'>
        <i class='mdi mdi-arrow-left'></i>
    </a>
		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat">
					<div class="card mb-sm-3 mb-md-0 contacts_card">

					     <!--input de Pesquisar-->
						<div class="card-header">
							<div class="input-group">
								<input type="text" placeholder="Pesquisar..." name="" class="form-control search">
								<div class="input-group-prepend">
									<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
								</div>
							</div>
						</div>

						<!--mensagens dos usuarios-->
						<div class="card-body contacts_body">
							<ui class="contacts">
					<?php 
			
						foreach( $USUARIOS as $U)
						//class="active"
							echo '
								<li onclick="carregar_mensagens('.$_SESSION['id_corrector'].','.$U->get_id().')">
									<div class="d-flex bd-highlight">
										<div hidden>{$U->get_}</div>
										<div class="img_cont">
											<img src="images/user2.png" class="rounded-circle user_img">
											<span class="online_icon"></span>
										</div>
										<div class="user_info">
											<span>'.$U->get_nome().'</span>
										</div>
									</div>
								</li>';
?>

							</ui>
						</div>

					   	<div class="card-footer"></div>
				    </div>
			    </div>
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div id="selecionado" hidden ></div>
							<div class="d-flex bd-highlight">

								<div class="img_cont">
									<img src="images/user2.png"class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>

								<!--total de mensagens-->
								<div class="user_info">
									<span>Mensagens</span>
									<p id="qtd_mensgns"></p>
								</div>
								<!--icon de video e de chamada-->


							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> Ver Perfil</li>
								</ul>
							</div>
						</div>
						<div class="card-body msg_card_body"></div>
						<div class="card-footer">
							<div class="input-group">
								<form method="POST" enctype="multipart/form-data">
									<input id="comprovativo" type="file" name="file" hidden>
								</form>
								<div class="input-group-append">
									<span class="input-group-text attach_btn" onclick="selecionar_foto()"><i class="fas fa-paperclip"></i></span>
								</div>
								<textarea name="" class="form-control type_msg" placeholder="Escreve a sua mensagem..."></textarea>
								<div class="input-group-append">
									<span onclick=enviar_mensagem(<?php echo $_SESSION['id_corrector']?>) class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
        <script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
		<script src="js/conversas.js"></script>
	</body>
</html>