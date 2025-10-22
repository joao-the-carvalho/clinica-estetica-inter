package Model;

import Controller.Conexao;
import View.FrmTelaCad;
import java.sql.*;
import javax.swing.JOptionPane;

public class mdl_serv {
    private Conexao con_bco;
    private FrmTelaCad frm;
    
    private int ID_servico;
    private String Nome;
    private String CPF;
    private String Funcao;
    
    public mdl_serv(){
        this(0,"","","");
    }
    public mdl_serv(int ID_Funcionario, String Nome, String CPF, String Funcao){
        this.ID_servico = ID_Funcionario;
        this.Nome = Nome;
        this.CPF = CPF;
        this.Funcao = Funcao;
    }

    public int getID_Func() {
        return ID_servico;
    }


    public void setID_Func(int ID_Funcionario) {
        this.ID_servico = ID_Funcionario;
    }

    
    public String getNome() {
        return Nome;
    }

    
    public void setNome(String Nome) {
        this.Nome = Nome;
    }

    
    public String getCPF() {
        return CPF;
    }


    public void setCPF(String CPF) {
        this.CPF = CPF;
    }

   
    public String getFunc() {
        return Funcao;
    }

    
    public void setFunc(String Funcao) {
        this.Funcao = Funcao;
    }
    
    public void cadastrar(FrmTelaCad form, Conexao con_bco){
    try{
            String insert_sql="INSERT INTO `funcionario` ( `Nome`, `CPF`, `Funcao`) VALUES('"+getNome()+"', '"+getCPF()+"', '"+getFunc()+"');"; 
            con_bco.statement.executeUpdate(insert_sql);
            JOptionPane.showMessageDialog(null,"Gravação realizada com sucesso!!","Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);

            con_bco.executaSQL("select * from funcionario order by ID_Funcionario");
            form.preencherTabela();
        }catch(SQLException errosql){
            JOptionPane.showMessageDialog(null,"\nErro na gravação : \n" +errosql,"Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);
        }
    }
    public void alterar(FrmTelaCad form, Conexao con_bco){
         try {
             String sql;
                String msg="";
                if(form.tcodigo.getText().equals("")){
                    sql="INSERT INTO `funcionario` ( `Nome`, `CPF`, `Funcao`) VALUES('"+getNome()+"', '"+getCPF()+"', '"+getFunc()+"');"; 
                    msg="Gravação de um novo registro";
                }
                else{
                    sql="UPDATE `cliente` SET `Nome` = '"+getNome()+"', `CPF` = '"+getCPF()+"', `Funcao` = '"+getFunc()+"' WHERE `funcionario`.`ID_Funcionario` = "+getID_Func();
                }
                con_bco.statement.executeUpdate(sql);
                JOptionPane.showMessageDialog(null,"Alteração realizada com sucesso!!","Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);

                con_bco.executaSQL("select * from funcionario order by ID_Funcionario");
                form.preencherTabela();
            }catch(SQLException errosql){
                JOptionPane.showMessageDialog(null,"\nErro na gravação : \n" +errosql,"Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);
            }
    }
    public void excluir(FrmTelaCad form, Conexao con_bco){
        String sql="";
        try {
            int resposta = JOptionPane.showConfirmDialog(null, "Deseja excluir o registro: ","Confirmar Exclusão", JOptionPane.YES_NO_OPTION,3);
            if(resposta ==0){
                sql = "delete from cliente where ID_Cliente = " +getID_Func();
                int excluir = con_bco.statement.executeUpdate(sql);
                if(excluir==1){
                    JOptionPane.showMessageDialog(null,"Exclusão realizada com sucesso!!","Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);
                    con_bco.executaSQL("select * from funcionario order by ID_Funcionario");
                    con_bco.resultset.first();
                    form.preencherTabela();
                    form.posicionarRegistro();
                }
                else{
                    JOptionPane.showMessageDialog(null,"Operação cancelada pelo usuário!!","Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);
                }
            }
        }catch(SQLException excecao){
            JOptionPane.showMessageDialog(null,"\nErro na exclusão : \n" +excecao,"Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);
        }
    }
    public void pesquisar(FrmTelaCad form, Conexao con_bco){
     try{
            String pesquisa = "select * from funcionario where Nome like '"+getNome()+"%'";
            con_bco.executaSQL(pesquisa);
            if(con_bco.resultset.first()){
                form.preencherTabela();
            }
            else{
                JOptionPane.showMessageDialog(null,"\n Não existe dados com este paramêtro!!","Mensagem do Programa",JOptionPane.INFORMATION_MESSAGE);   
            }

        }catch(SQLException errosql){
            JOptionPane.showMessageDialog(null,"\n Os dados digitados não foram localizados!! :\n "+errosql,"Mensagem do Programa",JOptionPane.INFORMATION_MESSAGE); 
        }   
        
    }
}
