<?php
namespace App\Controllers;
use App\Models\Model;
use Session\Session;
class CustomerController extends Controller{
    public function register(){

        return view("register", []);


    }
    public function login(){
        return view("login", []);

    }
    public function dashboard(){
        $customerID = Session::getSessionVariable('customerID');
        $customer = new Model();
        $currentBalance = $customer->calculateCurrentBalance($customerID);
        $balanceTransfer = $customer->listOfBalanceTransferred($customerID);
        return view("customer/dashboard", [
            "currentBalance" =>  $currentBalance,
            "balanceTransferList" => $balanceTransfer
        ]);
    }
    public function deposit(){
        $customerID =Session::getSessionVariable('customerID');
        $customer = new Model();
        $currentBalance = $customer->calculateCurrentBalance($customerID);
        return view("customer/deposit", [
            "currentBalance" =>  $currentBalance
        ]);
    }
    public function transfer(){
        $customerID = Session::getSessionVariable('customerID');
        $customer = new Model();
        $currentBalance = $customer->calculateCurrentBalance($customerID);
        return view("customer/transfer", [
            "currentBalance" =>  $currentBalance

        ]);

    }
    public function withdraw()
    {
        $customerID = Session::getSessionVariable('customerID');
        $customer = new Model();
        $currentBalance = $customer->calculateCurrentBalance($customerID);
        return view("customer/withdraw", [
            "currentBalance" =>  $currentBalance
        ]);
    }
    public function saveCustomer(){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $data = [
            "customerName"=> $name,
            "customerEmail"=>$email,
            "customerPassword"=> $password
        ];
        $customer = new Model();
        $customer->create($data,'Customer');
        return redirect("/");
    }
    public function verifyCustomer(){
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];
        $data = [
            "customerEmail"=>$email,
        ];
        $customer = new Model();
        $result = $customer->select($data, 'Customer');
        if(password_verify($_POST['password'],$result['customerPassword'])){
            echo "Login Successful";
            Session::setSessionVariable('customerID',$result['customerID']);
            Session::setSessionVariable('name',$result['customerName']);
            Session::setSessionVariable('email',$result['customerEmail']);
            Session::setSessionVariable('login',true);

        }else{
            echo "Credentials don't match";
        }
        return redirect("/customer/dashboard");
    }
    public function saveDeposit(){
        $customerID= Session::getSessionVariable('customerID');
;
        $data = [
            "amount"=>$_POST['amount'],
            "customerID" => $customerID,
            "transactionType" => "deposit"
        ];
        $customer = new Model();
        $result = $customer->create($data,'Transaction');
        return redirect("/customer/dashboard");
    }
    public function saveWithdraw(){
        $customerID= Session::getSessionVariable('customerID');
        $data = [
            "amount"=>$_POST['amount'],
            "customerID" => $customerID,
            "transactionType" => "withdraw"
        ];
        $customer = new Model();
        $result = $customer->create($data,'Transaction');
        return redirect("/customer/dashboard");
    }
    public function saveTransfer(){
        $customerID= Session::getSessionVariable('customerID');
        $customer = new Model();
        $data = [
            "customerEmail" => $_POST['email']
        ];
        $receiverInfo = $customer->select($data,'Customer');
        print_r( $receiverInfo);
        $data = [
            "customerID" => $customerID,
            "amount"=>$_POST['amount'],
            "transactionType" => "transfer",
            "receiverID" => $receiverInfo['customerID']];
        $result = $customer->create($data,'Transaction');
        return redirect("/customer/dashboard");

    }
    public function logout(){
        Session::destroy();
        return redirect("/");

    }

}
