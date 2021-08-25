<?php

namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;

class SubStr64Command extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('substr64command');
        // 设置参数
        
    }

    protected function execute(Input $input, Output $output)
    {
        $publicStr = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtS2jzJJqkOS65yHoeGjKve7Jkcj+VmbiiK9iVvnIkkQjp8/Vr80/+J1GqeQQMDNtme2RLkhmI4x408pzuas1QkuNpauQ5EX9ooXR1fPQspOZrg4MkRNI1FBol5lC+jOfNOrn38dZy9GKuAPNiOL3m6buYgpJtymwReVso10yBj8x8GDQexd87JTEGA/zqcbvUgzGnTWaZJX68ZhhcjAai9V+tsvaSeEtRPlgGDSn2Fgz6bpJRe7wq9OZJ81jMIi0RRwm4OrlAaot8Kx/ZAYyiN5Q2oHqPnAcY+2v32rjrg21jtOzh64slBMpmDP5E+n8G8plAu423LxueHMW5+CMqQIDAQAB";
        $privateStr = "MIIEpAIBAAKCAQEAubFyYLYmqPoaXg+q7xjdOViPsrosJDRuL5VCOEsE0KxMN2D+CuHVydyeUVrTIQQdTXNYIYcg9Z+vDeZv5TDdeEqd6Br98c4c3mCpbCwtSwMf+WrqMcFGRbE3w89vjjs9hGBFvhsqKcLjd7kWPy/fxMfUFZCoACVvl8B5IXQw1F4YwaWCcg5l++VBilKxu3jMpokWE4XaGdyS0reYrS3DLHrs4AdSRV1xH1OT7c46blfIiU6uzjLcwajuOE9qaDpy73596d/9ZwkeF3WStS5KfQ23SCuZcY7Ksl5d20Yq5qkmlw2SZXJ6vfSmG8KKfHmJugLcY++JigyoJglsdfhQYwIDAQABAoIBAQCrwilksTdjNytqc52NWPdPUs5f5/pqZqDAnJPK1AEZLzW0R5/T2v5PoCREZflB4bdk61rKcF4ZM+HMvqgjW6aO3J3gkg7wOdDUFJ7Bcr9WUgaiQrVq3jYswnYtRVMPQVZuekooRKIkTKLwG6ArRBH7x0YxyELNF9N3j027luiPlQJk6LFvhCCyUB1NG8qWGTetdb46UQW01Zk0w0XTamJf5SPoy33lqaYkax1oW/byeUtDAyyS4R0PLJlC2gJSfOmlhvrAlTc/8tLg7fd6R0ko4dyQvmw67wudQO2wxTZM6MWkCxVwYp5TSZ6aeeWngAPIB6FOpDv5Q04SQp7z9zp5AoGBAN9XLy55EOP8H7QH98DLBuL6YPeTKrdCQ/kjIhAO1/67267bd++q/07KAgI4Io5ygs1DYDXyEHXVVfHHAXWhxo1RQ9fLq6RM99WPJrFCRy0QtH0XCUGsj38cPJiTQw+vRdrBotbUhK45Xka24QQOvJnpwuN1MRnreAxOwxQxK79PAoGBANTY69R+SBL8ErOzs6YNLxmfdutUcXNrY/0iU/E2mig2szflBB38RhJcecctIcyM5x7wrqZxnL3B3MNKHO8GhTYJZEzVyF9hgVB9ZF7LKHlWmGPq9X906dkZ6VIaDom2lUQNH/6VsCa9l0xGk/82Og/Py9ky9zvtN7dQYtdj1XitAoGABHl5r4Ora/XkKLY0J3+pzqhXgv5Gz88bD4W9q/awKyFWYGVzPLD/VnPDoInBX3s51aTw64PDAqlYhHSJOfMYyEIFivBAqxUDrhqlGs4KIQQBqbPpcpBje5d0O1ZP9KN9UcmpWoZ9dgQeOGp3jZ5B9w9w4R+68Rr/l7eIPwJRLw8CgYAOmhMTsNYg90oRKfLZIW5pw5bU7iYaVPO3GfPISIaq25XP79YoeHYWLGHuWBpJfiEc7kYNBR5LplEO1LbHbxsUafCHlOL6KCZG71NDbYyJRneN40CUTeD9E9n91+vHZs82q+/V907uWXNXuD/O8llpXEgPzn9HjS6VVN5zCFZMwQKBgQC1wtKDIPPjChNFag7ytGKje7+ONy0CechLlg9PIehM2XPeUBzXyYjViHqMupDmQw7jb+ZB+K2VFXjvyMMbSy9s25kBcDwWc+duKePeJZ9LW/Vq6ncApzD5aajKbftlOXpwumcjQHRF3+uxP3BXTsDG+hiZGkUVcMbNK3AzuGOXQw==";
        $str = wordwrap($publicStr, 64, "\n", true) ;
        var_dump($str);die;
    }
}


