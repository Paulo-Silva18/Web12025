		<H1> Cadastro Itens </H1>
		
		<FORM action="contato.php?fun=cadastrar" method="POST" 
		enctype="multipart/form-data">
			
			<LABEL for="nome_produto"> Nome do Produto: </LABEL> 
			<INPUT type="text" id="nome_produto" name="nome_produto" /> <br />
			
			<LABEL for="descricao"> Descrição: </LABEL> 
			<INPUT type="text" id="descricao" name="descricao" /> <br />
			
			<LABEL for="preco"> Preço: </LABEL> 
			<INPUT type="text" id="preco" name="preco" /> <br />
			
			<INPUT type="submit" name="enviar" value="enviar" />
			
					
		</FORM>

