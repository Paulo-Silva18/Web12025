<HTML>
	<HEAD>
		<TITLE> Listagem de Itens </TITLE>
		<META charset="UTF-8" />
	</HEAD>
	<BODY>
		<?php
			if(isset($status)){ echo "<H2>".$status."</H2>";}
			//Se $status está preenchida, imprimir ela
		?>
		<A href="contato.php?fun=cadastrar" > Cadastrar </A>
		<br /><br />
			
		<TABLE border="1px">
			<TR> 
				<TH> ID </TH>
				<TH> Nome do Produto </TH>
				<TH> Descrição </TH>
				<TH> Preço </TH>	
				<TH> <img src="visao/img/update.png" width='30px' /> </TH>
				<TH> <img src="visao/img/delete.png" width='30px' /> </TH>
			</TR>
			<!-- Primeira linha da tabela com o cabeçalho -->
			
			    <?php
				foreach($lista as $c){	
					echo "<TR>"; 	

					echo "<TD>" . $c->getId() . "</TD>";
					
					echo "<TD><A href='contato.php?fun=exibir&id=". $c->getId() . 
					      "'>" . $c->getNome_Produto() . "</A></TD>";
					
					echo "<TD>" . $c->getDescricao() . "</TD>";
					
					echo "<TD>" . $c->getPreco() . "</TD>";		
					
					echo "<TD><A href=contato.php?fun=alterar&id=" . 
					      $c->getId() . "><img src='visao/img/update.png' width='30px'/> 
						  </A></TD>"; 

					echo "<TD><A href=contato.php?fun=excluir&id=" . 
					      $c->getId() . "><img src='visao/img/delete.png' width='30px' /> 
						  </A></TD>";	
					
					echo "</TR>";	
				}	
			?>	
		</TABLE>
	</BODY>
</HTML>
