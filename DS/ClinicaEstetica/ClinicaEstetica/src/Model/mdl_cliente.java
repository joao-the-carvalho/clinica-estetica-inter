package Model;

import Controller.Conexao;
import View.FrmTelaCad;
import java.sql.*;
import javax.swing.JOptionPane;

public class mdl_cliente {
    private Conexao con_bco;
    private FrmTelaCad frm;
    
    private int ID_Cliente;
    private String Nome;
    private String CPF;
    private String Data_nascimento;
    
    public mdl_cliente(){
        this(0,"","","");
    }
    public mdl_cliente(int ID_Cliente, String Nome, String CPF, String Data_nascimento){
        this.ID_Cliente = ID_Cliente;
        this.Nome = Nome;
        this.CPF = CPF;
        this.Data_nascimento = Data_nascimento;
    }

    public int getID_Cliente() {
        return ID_Cliente;
    }


    public void setID_Cliente(int ID_Cliente) {
        this.ID_Cliente = ID_Cliente;
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

   
    public String getData() {
        return Data_nascimento;
    }

    
    public void setData(String Data_nascimento) {
        this.Data_nascimento = Data_nascimento;
    }
    
     public void cadastrar(FrmTelaCad form, Conexao con_bco){
    try{
            String insert_sql="INSERT INTO `cliente` ( `Nome`, `CPF`, `Data_nascimento`) VALUES('"+getNome()+"', '"+getCPF()+"', '"+getData()+"');"; 
            con_bco.statement.executeUpdate(insert_sql);
            JOptionPane.showMessageDialog(null,"Gravação realizada com sucesso!!","Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);
            con_bco.executaSQL("select * from cliente order by ID_Cliente");
        }catch(SQLException errosql){
            JOptionPane.showMessageDialog(null,"\nErro na gravação : \n" +errosql,"Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);
        }
    }
    
    public void alterar(FrmTelaCad form, Conexao con_bco){
         try {
             String sql;
                String msg="";
                if(form.tcodigo.getText().equals("")){
                    sql="INSERT INTO `cliente` ( `Nome`, `CPF`, `Data_nascimento`) VALUES('"+getNome()+"', '"+getCPF()+"', '"+getData()+"');"; 
                    msg="Gravação de um novo registro";
                }
                else{
                    sql="UPDATE `cliente` SET `Nome` = '"+getNome()+"', `CPF` = '"+getCPF()+"', `Data_nascimento` = '"+getData()+"' WHERE `cliente`.`ID_Cliente` = "+getID_Cliente();
                }
                con_bco.statement.executeUpdate(sql);
                JOptionPane.showMessageDialog(null,"Alteração realizada com sucesso!!","Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);

                con_bco.executaSQL("select * from cliente order by ID_Cliente");
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
                sql = "delete from cliente where ID_Cliente = " +getID_Cliente();
                int excluir = con_bco.statement.executeUpdate(sql);
                if(excluir==1){
                    JOptionPane.showMessageDialog(null,"Exclusão realizada com sucesso!!","Mensagem do programa",JOptionPane.INFORMATION_MESSAGE);
                    con_bco.executaSQL("select * from cliente order by ID_Cliente");
                    con_bco.resultset.first();
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
            String pesquisa = "select * from cliente where Nome like '"+form.pesquisa.getText()+"%'";
            con_bco.executaSQL(pesquisa);
            if(con_bco.resultset.first()){
                form.preencherTabela();
                form.posicionarRegistro();
            }
            else{
                JOptionPane.showMessageDialog(null,"\n Não existe dados com este paramêtro!!","Mensagem do Programa",JOptionPane.INFORMATION_MESSAGE);   
            }

        }catch(SQLException errosql){
            JOptionPane.showMessageDialog(null,"\n Os dados digitados não foram localizados!! :\n "+errosql,"Mensagem do Programa",JOptionPane.INFORMATION_MESSAGE); 
        }   
        
    }
}
