# Sistema de Gerência de Associados e Anuidades

## Descrição
Um sistema de gerência para a associação "Devs do RN", que permite cadastrar associados, gerenciar anuidades e verificar status de pagamento.

## Instalação
1. Instale e configure o XAMPP.
2. Copie o projeto para `C:/xampp/htdocs/desafiophp`.
3. Importe o arquivo `meu_database.sql` no phpMyAdmin para criar o banco de dados.

## Uso
1. Acesse `http://localhost/desafiophp/listar_associados.php` para visualizar a lista de associados.
2. Use as funcionalidades de cadastrar, cobrar e pagar anuidades.

## Uso de funcionalidades específicas
1. EDITAR ASSOCIADO:
http://localhost/desafiophp/editar_associado.php?id=[ID_DO_ASSOCIADO]
2. DELETAR ASSOCIADO:
http://localhost/desafiophp/deletar_associado.php?id=[ID_DO_ASSOCIADO]
3. COBRAR ANUIDADE:
http://localhost/desafiophp/cobrar_anuidade.php?id=[ID_DO_ASSOCIADO]

## Estrutura do Banco de Dados
- **Associados**: Armazena informações básicas dos associados.
- **Anuidades**: Define valores anuais das anuidades.
- **Pagamentos**: Registra os pagamentos feitos pelos associados.

## Funcionalidades
- Cadastro e listagem de associados.
- Cadastro e cobrança de anuidades.
- Registro de pagamentos e exibição de status.
