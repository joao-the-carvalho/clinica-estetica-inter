package View;

import java.awt.*;
import java.text.*;
import javax.swing.*;
import Controller.Conexao;
import javax.swing.JOptionPane;
import java.sql.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import com.formdev.flatlaf
        .FlatDarculaLaf;
import java.util.Arrays;
public class FrmLogin extends JFrame {
    Conexao con_cliente;
    JPasswordField tsen;
    JLabel rusu, rsen, rtit;
    JTextField tusu, outrotsen;
    JButton blogar, exib;
    boolean mostrandoSenha = false;
public FrmLogin(){
    con_cliente = new Conexao();
    con_cliente.conecta();
    
    setTitle("Login para Acesso");
    Container tela = getContentPane();
    setLayout(null);
    rtit = new JLabel("Acesso ao Sistema");
    rusu = new JLabel("Usuário: ");
    rsen = new JLabel("Senha: ");
    tsen = new JPasswordField(20);
    tusu = new JTextField(20);
    outrotsen = new JTextField(20);
    blogar = new JButton("Logar");
    exib = new JButton("Exibir");
    
    
    rtit.setBounds(0, 0, 400, 20);
    rtit.setFont(new Font("Comic Sans MS", Font.PLAIN, 20));
    rtit.setHorizontalAlignment(SwingConstants.CENTER);
    
    rusu.setBounds(30, 40, 100, 20);
    rusu.setFont(new Font("Comic Sans MS", Font.PLAIN,16));
    
    rsen.setBounds(30, 80, 100, 20);
    rsen.setFont(new Font("Comic Sans MS", Font.PLAIN,16));
    
    tsen.setBounds(82, 83, 100, 20);

    outrotsen.setBounds(82, 83, 100, 20);
    outrotsen.setVisible(false);
    exib.setBounds(182, 83, 100, 20);
    tusu.setBounds(93, 43, 100, 20);
    
    blogar.setBounds(135, 120, 120, 20);
    blogar.setFont(new Font("Comic Sans MS", Font.PLAIN, 16));
    blogar.addActionListener(new ActionListener() {
        int tentativa = 0;

        public void actionPerformed(ActionEvent e) {
            try {
                String usuario = tusu.getText();
                String senha = new String(tsen.getPassword());
                String pesquisa = "select * from tblusuario where usuario = '" + usuario + "' AND senha = '" + senha + "'";
                con_cliente.executaSQL(pesquisa);

                if (con_cliente.resultset.next()) {
                    FrmMenu menu = new FrmMenu();
                    menu.setVisible(true);
                    dispose();
                } else {
                    tentativa++;
                    JOptionPane.showMessageDialog(null, "Usuário não encontrado, tente novamente.", "Mensagem do Programa", JOptionPane.ERROR_MESSAGE);
                    tusu.setText("");
                    tsen.setText("");
                    tusu.requestFocus();

                    if (tentativa >= 3) {
                        JOptionPane.showMessageDialog(null, "Número máximo de tentativas atingido, encerrando o programa.");
                        con_cliente.desconecta();
                        System.exit(0);
                    }
                }
            } catch (SQLException erro) {
                tentativa++;
                JOptionPane.showMessageDialog(null, "Erro no banco: " + erro, "Mensagem do Programa", JOptionPane.ERROR_MESSAGE);
                if (tentativa >= 3) {
                    con_cliente.desconecta();
                    System.exit(0);
                }
            }
        }
    });
    exib.addActionListener(new ActionListener() {
                public void actionPerformed(ActionEvent e) {
                    if (!mostrandoSenha) {
                        String senha = new String(tsen.getPassword());
                        outrotsen.setText(senha);
                        outrotsen.setEditable(false);

                        tsen.setVisible(false);
                        outrotsen.setVisible(true);
                        mostrandoSenha = true;
                    } else {
                        tsen.setText(outrotsen.getText());
                        tsen.setEditable(true);

                        outrotsen.setVisible(false);
                        tsen.setVisible(true);
                        mostrandoSenha = false;
                    }
                }
            });


    tela.add(rtit);
    tela.add(rsen);
    tela.add(rusu);
    tela.add(tsen);
    tela.add(tusu);
    tela.add(blogar);
    tela.add(exib);
    tela.add(outrotsen);
    setSize(400, 220);
    setLocationRelativeTo(null);
    setVisible(true);
}
    public static void main(String[] args) {
        FlatDarculaLaf.setup();
        new FrmLogin();
    }
}
