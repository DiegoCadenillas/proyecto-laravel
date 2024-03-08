<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        return view('sendemail');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendActivationEmail(String $id)
    {
        $mail = new PHPMailer(true);

        try {
            $user = User::find($id);
            /* Email SMTP Settings */
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->Port = env('MAIL_PORT');

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($user->email);

            $mail->isHTML(true);

            $mail->Subject = "Activación de Cuenta Proyecto-Laravel";
            $mail->Body = "<h3>Bienvenid@, $user->name!</h3>";
            $mail->Body .= "\nFalta un último paso para que pueda usar su nueva cuenta TableGames...";
            $mail->Body .= "\nSólo debe dar click al enlace para activar su cuenta.";
            // Esto es direccionamiento absoluto. En práctica estaría bien: nuestra página web tendría un dominio y un servidor estáticos, no estaría cambiando por cada usuario...
            $mail->Body .= "\n<br><form method='post' action='localhost/ActivateUserController.php'>";
            $mail->Body .= "<input type=hidden name='email' value='$user->email'/>";
            $mail->Body .= "<input type=hidden name='activation_token' value='$user->activationToken'/>";
            $mail->Body .= "<button type='submit' style='background-color:black;color:white;padding:5px;border-radius:3px;'>Activar cuenta</button>";
            $mail->Body .= "</form>";

            if (!$mail->send()) {

                return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
            } else {
                return back()->with("success", "Email has been sent.");
            }
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent.');
        }
    }
}
