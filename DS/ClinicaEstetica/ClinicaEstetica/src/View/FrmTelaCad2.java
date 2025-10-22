package View;

import java.awt.*;
import java.text.*;
import javax.swing.*;
import javax.swing.text.MaskFormatter;
import javax.swing.table.DefaultTableModel;
import Controller.Conexao;
import javax.swing.JOptionPane;
import java.sql.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import com.formdev.flatlaf
        .FlatDarculaLaf;
public class FrmTelaCad2 extends JFrame{
    Conexao con_cliente;
    JLabel rCod, rNome, rEmail, rTel, rData;
    JButton prim, ant, prox, ult, nov, alt, exc, grav, butpesq;
    public JTextField tcodigo, tnome, temail, pesquisa;
    JFormattedTextField tel, data;
    MaskFormatter mTel, mData;
    JTable tblClientes;
    JScrollPane scp_tabela;
    public FrmTelaCad2(){
        con_cliente = new Conexao();
        con_cliente.conecta();
        ImageIcon icone = new ImageIcon("ibagens/iconepesquisa.png");
        /*ImageIcon icone2 = new ImageIcon("ibagens/last.png");
        ImageIcon icone3 = new ImageIcon("ibagens/nex.png");
        ImageIcon icone4 = new ImageIcon("ibagens/prev.png");
        ImageIcon icone5 = new ImageIcon("ibagens/first icon.png");*/
        setIconImage(icone.getImage());
        setTitle("Conexão Java com MySQL");
        setLayout(null);
        setResizable(false);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setLocationRelativeTo(null);
        Container tela = getContentPane();
        // declaração de jlabels
        rCod = new JLabel("Código: ");
        rNome = new JLabel("Nome: ");
        rEmail = new JLabel("Email: ");
        rTel = new JLabel("Telefone: ");
        rData = new JLabel("Data de Nascimento: ");
        rCod.setBounds(50, 50, 140, 20);
        rNome.setBounds(50, 80, 140, 20);
        rEmail.setBounds(50, 110, 140, 20);
        rTel.setBounds(50, 140, 140, 20);
        rData.setBounds(50, 170, 140, 20);
        tela.add(rCod);
        tela.add(rNome);
        tela.add(rEmail);
        tela.add(rTel);
        tela.add(rData);

        // declaração de jtextfield
        tcodigo = new JTextField(4);
        tcodigo.setBounds(95, 50, 50, 30);
        tela.add(tcodigo);

        tnome = new JTextField(15);
        tnome.setBounds(90, 80, 140, 30);
        tela.add(tnome);

        temail = new JTextField(15);
        temail.setBounds(90, 110, 140, 30);
        tela.add(temail);

        pesquisa = new JTextField(20);
        pesquisa.setBounds(50, 505, 170, 30);
        tela.add(pesquisa);

        //jformattedtextfield
        try{
            mTel = new MaskFormatter("(##)####-####");
            mData = new MaskFormatter("##/##/####");
            mTel.setPlaceholderCharacter('_');
            mData.setPlaceholderCharacter('_');
        }
        catch(ParseException excp){}
        tel = new JFormattedTextField(mTel);
        data = new JFormattedTextField(mData);
        tel.setBounds(110, 140, 140, 30);
        data.setBounds(170, 170, 140, 30);
        tel.setBackground(new Color(175,103,175));
        data.setBackground(new Color(44, 71, 104));
        tela.add(tel);
        tela.add(data);

    //jbuttons

        prim = new JButton("Primeiro");
        ant = new JButton("Anterior");
        prox = new JButton("Próximo");
        ult = new JButton("Último");
        nov = new JButton("Novo Registro");
        grav = new JButton("Gravar");
        alt = new JButton("Alterar");
        exc = new JButton("Excluir");
        butpesq = new JButton("Pesquisar");
        prim.setBounds(50, 200, 100, 40);
        ant.setBounds(150, 200, 100, 40);
        prox.setBounds(250, 200, 100, 40);
        ult.setBounds(350, 200, 100, 40);
        nov.setBounds(50, 240, 150, 40);
        grav.setBounds(200, 240, 100, 40);
        alt.setBounds(300, 240, 100, 40);
        exc.setBounds(400, 240, 100, 40);
        butpesq.setBounds(230,500, 100, 40);
        JButton sair = new JButton("Sair");
        sair.setBounds(420, 500, 100, 40);
        tela.add(sair);
        tela.add(prim);
        tela.add(ant);
        tela.add(prox);
        tela.add(ult);
        tela.add(nov);
        tela.add(grav);
        tela.add(alt);
        tela.add(exc);
        tela.add(butpesq);

        //action listeners pros botões
        prim.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try{
                    con_cliente.resultset.first();
                    mostrar_Dados();
                }catch(SQLException erro){
                JOptionPane.showMessageDialog(null, "Não foi possível acessar o primeiro registro!"+erro,"Mensagem do Programa",JOptionPane.ERROR_MESSAGE);
                }
            }
        });
        ant.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try{
                    if (!con_cliente.resultset.previous()) {
                        con_cliente.resultset.last();
                    }
                    mostrar_Dados();
                }catch(SQLException erro){
                    JOptionPane.showMessageDialog(null, "Não foi possível acessar o registro anterior!"+erro,"Mensagem do Programa",JOptionPane.ERROR_MESSAGE);
                }
            }
        });
        prox.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try{
                    if (!con_cliente.resultset.next()) {
                        con_cliente.resultset.first();
                    }
                    mostrar_Dados();
                }catch(SQLException erro){
                    JOptionPane.showMessageDialog(null, "Não foi possível acessar o registro posterior!"+erro,"Mensagem do Programa",JOptionPane.ERROR_MESSAGE);
                }
            }
        });
        ult.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try{
                    con_cliente.resultset.last();
                    mostrar_Dados();
                }catch(SQLException erro){
                    JOptionPane.showMessageDialog(null, "Não foi possível acessar o último registro!"+erro,"Mensagem do Programa",JOptionPane.ERROR_MESSAGE);
                }
            }
        });
        nov.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                tcodigo.setText("");
                tnome.setText("");
                data.setText("");
                tel.setText("");
                temail.setText("");
                tcodigo.requestFocus();
            }
        });
        grav.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String nom = tnome.getText();
                String dat = data.getText();
                String telef = tel.getText();
                String email = temail.getText();
                try{
                    String insert_sql = "insert into tbclientes (nome, telefone, email, dt_nasc) values ('" + nom + "','"+telef+"','"+email+"','"+dat+"')";
                    con_cliente.statement.executeUpdate(insert_sql);
                    JOptionPane.showMessageDialog(null, "Gravação realizada com sucesso!","Mensagem do Programa",JOptionPane.INFORMATION_MESSAGE);
                    con_cliente.executaSQL("select * from tbclientes order by cod   ");
                    preencherTabela();
                }catch (SQLException erro){
                    JOptionPane.showMessageDialog(null, "Não foi possível acessar o último registro!"+erro,"Mensagem do Programa",JOptionPane.ERROR_MESSAGE);
                }
            }
        });
        alt.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try {
                    String nome = tnome.getText();
                    String data_nasc = data.getText();
                    String telefonee = tel.getText();
                    String email = temail.getText();
                    String sql;
                    String msg = "";
                    if (tcodigo.getText().equals("")) {
                        sql = "insert into tbclientes (nome, telefone, email, dt_nasc) values ('" + nome + "','" + telefonee + "','" + email + "','" + data_nasc + "')";
                        msg = "Gravação de um novo registro";
                    } else {
                        sql = "update tbclientes set nome='" + nome + "',telefone='" + telefonee + "', email='" + email + "', dt_nasc='" + data_nasc + "' where cod = " + tcodigo.getText();
                    }
                    con_cliente.statement.executeUpdate(sql);
                    JOptionPane.showMessageDialog(null, "Gravação realizada com sucesso","Mensagem do Programa",JOptionPane.INFORMATION_MESSAGE);
                    con_cliente.executaSQL("select * from tbclientes order by cod");
                    preencherTabela();
                    posicionarRegistro();
                }catch(SQLException erro){
                    JOptionPane.showMessageDialog(null, "Erro na gravação!\n"+erro,"Mensagem do Programa",JOptionPane.ERROR_MESSAGE);
                }
            }

        });
        exc.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String sql="";
                try{
                    int resposta = JOptionPane.showConfirmDialog(rootPane, "Deseja excluir o registro?", "Confirmar exclusão", JOptionPane.YES_NO_OPTION);
                    if(resposta == 0){
                        sql = "delete from tbclientes where cod = "+tcodigo.getText();
                        int excluir = con_cliente.statement.executeUpdate(sql);
                        if(excluir == 1){
                            JOptionPane.showMessageDialog(null, "Exclusão realizada com sucesso!", "Mensagem do Programa",JOptionPane.INFORMATION_MESSAGE);
                            con_cliente.executaSQL("select * from tbclientes order by cod");
                            con_cliente.resultset.first();
                            preencherTabela();
                            posicionarRegistro();
                        }
                        else{
                            JOptionPane.showMessageDialog(null, "Operação cancelada pelo usuário!", "Mensagem do Programa", JOptionPane.INFORMATION_MESSAGE);
                        }
                    }
                }catch(SQLException erro){
                    JOptionPane.showMessageDialog(null, "Erro na exclusão: "+erro, "Mensagem do Programa", JOptionPane.ERROR_MESSAGE);
                }
            }
        });
        butpesq.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                try{
                    String pesq = "select * from tbclientes where nome like '"+pesquisa.getText()+"%'";
                    con_cliente.executaSQL(pesq);
                    if(con_cliente.resultset.first()){
                        preencherTabela();
                    }
                    else{
                        JOptionPane.showMessageDialog(null, "Não existe dados com este parâmetro!","Mensagem do programa",JOptionPane.WARNING_MESSAGE);
                    }
                }catch(SQLException erro){
                    JOptionPane.showMessageDialog(null, "Os dados digitados não foram localizados! erro: "+erro, "Mensagem do programa",JOptionPane.ERROR_MESSAGE);
                }
            }
        });
        sair.addActionListener(new ActionListener(){
            public void actionPerformed(ActionEvent e){
                FrmMenu menu = new FrmMenu();
                menu.setVisible(true);
                dispose();
            }
        });

     //config da tabela abaixo
     tblClientes = new javax.swing.JTable();
     scp_tabela = new javax.swing.JScrollPane();
     
     tblClientes.setBounds(50,280,650,200);
     scp_tabela.setBounds(50,280,650,200);
     
     tela.add(tblClientes);
     tela.add(scp_tabela);
     
     tblClientes.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0,0,0)));
     tblClientes.setFont(new java.awt.Font("Arial", 1, 12));
     tblClientes.setModel(new javax.swing.table.DefaultTableModel(
             new Object [][]{
                 {null, null, null, null, null},
                 {null, null, null, null, null},
                 {null, null, null, null, null},
                 {null, null, null, null, null}
             },
             new String [] {"Código", "Nome", "Data de Nascimento", "Telefone", "Email"})
     {
     boolean[] canEdit = new boolean []{false, false, false, false, false};
     public boolean isCellEditable(int rowIndex, int columnIndex){return canEdit [columnIndex];}
             });
     scp_tabela.setViewportView(tblClientes);

        tblClientes.setAutoCreateRowSorter(true);
        
      //chega de tabela  
        setSize(800,600);
        setVisible(true);
        setLocationRelativeTo(null);
        con_cliente.executaSQL("select * from tbclientes order by cod");
        preencherTabela();
        posicionarRegistro();
    }
    public void preencherTabela(){
        tblClientes.getColumnModel().getColumn(0).setPreferredWidth(4);
        tblClientes.getColumnModel().getColumn(1).setPreferredWidth(150);
        tblClientes.getColumnModel().getColumn(2).setPreferredWidth(11);
        tblClientes.getColumnModel().getColumn(3).setPreferredWidth(14);
        tblClientes.getColumnModel().getColumn(4).setPreferredWidth(100);

        DefaultTableModel modelo = (DefaultTableModel) tblClientes.getModel();
        modelo.setNumRows(0);

        try{
            con_cliente.resultset.beforeFirst();
            while(con_cliente.resultset.next()){
                modelo.addRow(new Object[]{
                        con_cliente.resultset.getString("cod"),con_cliente.resultset.getString("nome"),con_cliente.resultset.getString("dt_nasc"),con_cliente.resultset.getString("telefone"),con_cliente.resultset.getString("email")
                });
            }
        }
        catch(SQLException erro){
            JOptionPane.showMessageDialog(null, "Erro ao listar dados da tabela"+erro,"Mensagem do Programa",JOptionPane.ERROR_MESSAGE);
        }
    }
    public void posicionarRegistro(){
        try{
            con_cliente.resultset.first();
            mostrar_Dados();
        }catch(SQLException erro){
            JOptionPane.showMessageDialog(null,"Não foi possível posicionar no primeiro registro:"+erro,"Mensagem do Programa",JOptionPane.ERROR_MESSAGE);
        }
    }
    public void mostrar_Dados(){
        try{
            tcodigo.setText(con_cliente.resultset.getString("cod"));
            tnome.setText(con_cliente.resultset.getString("nome"));
            data.setText(con_cliente.resultset.getString("dt_nasc"));
            tel.setText(con_cliente.resultset.getString("telefone"));
            temail.setText(con_cliente.resultset.getString("email"));
        }catch(SQLException erro){
            JOptionPane.showMessageDialog(null,"Não localizou dados: "+erro,"Mensagem do Programa",JOptionPane.ERROR_MESSAGE);
        }
    }

}

