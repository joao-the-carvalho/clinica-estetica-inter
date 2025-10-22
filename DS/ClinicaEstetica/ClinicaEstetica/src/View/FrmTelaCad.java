package View;

import java.awt.*;
import java.text.*;
import javax.swing.*;
import javax.swing.text.MaskFormatter;
import javax.swing.table.DefaultTableModel;
import Controller.Conexao;
import Model.mdl_cliente;
import javax.swing.JOptionPane;
import java.sql.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import com.formdev.flatlaf
        .FlatDarculaLaf;
public class FrmTelaCad extends JFrame{
    FrmTelaCad cad;
    Conexao con_cliente;
    JLabel rCod, rNome, rCPF, rData;
    JButton prim, ant, prox, ult, nov, alt, exc, grav, butpesq;
    public JTextField tcodigo, tnome, tcpf, pesquisa;
    JFormattedTextField data, cpf;
    MaskFormatter mData, mCPF;
    JTable tblClientes;
    JScrollPane scp_tabela;
    mdl_cliente cliente;
    public FrmTelaCad(){
        con_cliente = new Conexao();
        con_cliente.conecta();
        cliente = new mdl_cliente();
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
        rCPF = new JLabel("CPF: ");
        rData = new JLabel("Data de Nascimento: ");
        rCod.setBounds(50, 50, 140, 20);
        rNome.setBounds(50, 80, 140, 20);
        rCPF.setBounds(50, 110, 140, 20);
        rData.setBounds(50, 140, 140, 20);
        tela.add(rCod);
        tela.add(rNome);
        tela.add(rCPF);
        tela.add(rData);

        // declaração de jtextfield
        tcodigo = new JTextField(4);
        tcodigo.setBounds(95, 50, 50, 30);
        tela.add(tcodigo);

        tnome = new JTextField(15);
        tnome.setBounds(90, 80, 140, 30);
        tela.add(tnome);

        pesquisa = new JTextField(20);
        pesquisa.setBounds(50, 505, 170, 30);
        tela.add(pesquisa);

        //jformattedtextfield
        try{
            mCPF = new MaskFormatter("###.###.###-##");
            mData = new MaskFormatter("##/##/####");
            mCPF.setPlaceholderCharacter('_');
            mData.setPlaceholderCharacter('_');
        }
        catch(ParseException excp){}
        data = new JFormattedTextField(mData);
        cpf = new JFormattedTextField(mCPF);
        cpf.setBounds(80, 110, 140, 30);
        data.setBounds(170, 140, 140, 30);
        data.setBackground(new Color(44, 71, 104));
        cpf.setBackground(new Color(44, 71, 104));
        tela.add(data);
        tela.add(cpf);

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
                cpf.setText("");
                data.setText("");
                tnome.requestFocus();
            }
        });
        grav.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                cliente.setNome(tnome.getText());
                cliente.setCPF(cpf.getText());
                cliente.setData(data.getText());
                cliente.cadastrar(cad, con_cliente);
                preencherTabela();
                posicionarRegistro();
            }
        });
        alt.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                cliente.setID_Cliente(Integer.parseInt(tcodigo.getText()));
                cliente.setNome(tnome.getText());
                cliente.setCPF(cpf.getText());
                cliente.setData(data.getText());
                cliente.alterar(cad, con_cliente);
                preencherTabela();
                posicionarRegistro();
            }

        });
        exc.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                cliente.setID_Cliente(Integer.parseInt(tcodigo.getText()));
                cliente.setNome(tnome.getText());
                cliente.setCPF(cpf.getText());
                cliente.setData(data.getText());
                cliente.excluir(cad, con_cliente);
                preencherTabela();
                posicionarRegistro();
            }
        });
        butpesq.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                cliente.pesquisar(cad, con_cliente);
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
                 {null, null, null, null},
                 {null, null, null, null},
                 {null, null, null, null},
                 {null, null, null, null}
             },
             new String [] {"ID_Cliente", "Nome", "CPF", "Data de Nascimento"})
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
        con_cliente.executaSQL("select * from cliente order by ID_Cliente");
        preencherTabela();
        posicionarRegistro();
    }
    public void preencherTabela(){
        tblClientes.getColumnModel().getColumn(0).setPreferredWidth(4);
        tblClientes.getColumnModel().getColumn(1).setPreferredWidth(150);
        tblClientes.getColumnModel().getColumn(2).setPreferredWidth(14);
        tblClientes.getColumnModel().getColumn(3).setPreferredWidth(14);

        DefaultTableModel modelo = (DefaultTableModel) tblClientes.getModel();
        modelo.setNumRows(0);

        try{
            con_cliente.resultset.beforeFirst();
            while(con_cliente.resultset.next()){
                modelo.addRow(new Object[]{
                        con_cliente.resultset.getString("ID_Cliente"),con_cliente.resultset.getString("Nome"),con_cliente.resultset.getString("CPF"),con_cliente.resultset.getString("Data_nascimento")});
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
            tcodigo.setText(con_cliente.resultset.getString("ID_Cliente"));
            tnome.setText(con_cliente.resultset.getString("Nome"));
            cpf.setText(con_cliente.resultset.getString("CPF"));
            data.setText(con_cliente.resultset.getString("Data_nascimento"));
        }catch(SQLException erro){
            JOptionPane.showMessageDialog(null,"Não localizou dados: "+erro,"Mensagem do Programa",JOptionPane.ERROR_MESSAGE);
        }
    }
 /*   public static void main(String[] args) {
        FlatDarculaLaf.setup();
        new FrmTelaCad();
    }*/
}

