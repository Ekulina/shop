<?php

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2021 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
    "-----BEGIN RSA PRIVATE KEY-----
    MIIEogIBAAKCAQEAqYk6XYl4I/mPYooczssrwd0KxtyBikfjQxdSLyUC6TcRVj99
    qEeBq9//8yJRFQHrqXadxFzQA6V0aX68aW+fEJKqyQHga/HhQzwyE+bKf8wrStbP
    4nFe/XI0g5ZXuXW+3bN/4OiZTpYwh2HTVE8DtOuguKXMnlCTZPEU3uRFe5MHtUV1
    2xCFyx3d3QYHwjarAo6DPsnLGbYue3A1CGEemHKiLWc2vvVqHy2/KOdf4xSZ6rUB
    +2vqThMk7Ov7Fhgk7vKGLHQZT3+2WSvRl9b4gFmWU2MUrHLIkFwW57T7cRmElOQL
    RvQoJzH8S8jzn66SMlHqj+JJFZS5lsnjQLNC2QIDAQABAoIBADN+jQ3QLX+v0494
    p9tf9sCBpT5Vx7r6rtq4AKx1L3cq1Mc/rakpXweXmCR/beVVmgD1GGKGVmBlJwDM
    D+pujv/3rIw1V7cx1twXMpa86RD8MMIgkTAUg2e0AqNdTPP2Aa1RUiw8OiSWldLp
    MclP3q5bS4wKQCZuDvcACvjQmRI5TfENCwhlqfWt8VOP5DRjSkLLF004MaKKKllF
    BWhK8I0PBeBrPFaPH52ctvbzZ3MapIxG4u6sjTeknJQLWHijOkg0YdK5ELytVH1H
    xgXLu/79L30NBnaYZLeNeNcEB5EBQ+wSigm7RTde8UP/TG72czvjplP0JUl4AKpi
    9VpfmQECgYEA09SXp4GpnGCVEYngk0pkL1MwGRLQR8EIpSyoIvY8ZhOvnw0u3nWC
    ZcYr/CHfAHT/yh+sf4M0KyT/ZbV3yPEL07ZowgjDHmwQWkJ80QfjqGMcufC7zKvy
    Sl+m5G6+9iROKX8qLQeq0Af1BlzgyiEs/lBfrT2nyBOjDMHBBjV7KRECgYEAzOL7
    LGRZop1v8FckoofTvDEjlv/RgY/tzSqtcNXf+9SHGKK9QrxGNX2np3V/yipHpAEb
    Fx3Dl7O9mta+jF+yE5nU7Bhwm4tdphRqskyXLvNf6Y0p2MOVdtxKFx/7NXY+6Gdo
    3yTatN0BOoTNC/aV65y4UDSXi9C5MLlP9ZcTvUkCgYBPkv4BS8EWYGW/N+coDXsD
    GCHqWVnqioYf3l2u/IcF5YFEo2Qm50e7yaz+Qw8NkeYA3NMk93mid3yFjZzY3EwQ
    FObXdQkvJXMjJPTUZT1NJSZGZzt1EGatL693Am8z8cF27zE9xzKQgVy3Li63X60S
    P8khQBcGHvJSOXq0RWTlsQKBgAsoXUdYm60IZ90t0bfsL7Ky9l41xkIJBYlDxrg7
    XXxIYacMzcPBnw0wr52l/3SSAt7ClKgYnds4FZ5GDZB1cawxl2/YEOHXoBz4Ras6
    Eo2jAVklr963H/+eFYbW3gZWTyy23PYx+psY4gU+0C/TmOyA12S+yHX7wuoNXXZh
    aNjJAoGAcpJIk8uNNclbRM3GINruvvy363UWBw/FJGpvccSNZzXy8yCsZLTgAlVv
    xRR0cTlEjxfNX+jZGSkE8hj4coavcsU9Yqitw4h4qxdwKVL8I7RgEUUt14e9fgaN
    kaP1RRYFoR/wQ2WzjfFEvOmVrkHUBYdqh2RSuW3iM4DCG/pZtHc=
    -----END RSA PRIVATE KEY-----");

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid100010",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => $_POST['total'],
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE171010123456789017",
        "VK_NAME"        => $_POST['fname'] . " " . $_POST['sname'],
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => $_POST['email'] . "_" . $_POST['phone'],//message
        "VK_RETURN"      => "http://localhost/hajusrakendused/shop/?msg=success",//success
        "VK_CANCEL"      => "http://localhost/hajusrakendused/shop/?msg=cancel",//Cancel
        "VK_DATETIME"    => date('Y-m-d\TH:i:sO'),
        "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! SEB expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE171010123456789017 */
        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/ukDX4OZ3yAq7Kl5K?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/ukDX4OZ3yAq7Kl5K?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2021-02-25T14:58:39+0200 */

/* $data = "0041011003008009uid10001000512345003150003EUR020EE171010123456789017009ÕIE MÄGER0071234561011Torso Tiger069http://localhost:8080/project/ukDX4OZ3yAq7Kl5K?payment_action=success068http://localhost:8080/project/ukDX4OZ3yAq7Kl5K?payment_action=cancel0242021-02-25T14:58:39+0200"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* ldVaV6IKwh18TNVK0F9ED5qUi87Kn9mnDBv4mswNt/x9v0N+cF/fnEwHc4TGXg1/Z2E17TsGO/gbdKNGUPUz7TWChdS3u1Zoxm0fETojBYFQvEhtA+AxCThmArTvVpYqfHAUAQhbeFBBcw8uUDV4XhR4MGQaiuTK8MRAxrTkbbmDZoYvMOqWEDlf85lejps1bi3cKg8TKdiBAzgGgAsp2LtH0bRs24LlMYM4r92aD4mdR7qGVkxkd9e+zEkBvBqQ//OLjjepSUJe+tFD9dYa6I80ab3CSofBcaUjSSu1itstPbUJPE8eNSM5Mgbo5+LzYIYwGt0Qt/3XwUP/E+msuA== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

        <form method="post" action="http://localhost:8080/banklink/seb-common">
            <!-- include all values as hidden form fields -->
<?php foreach($fields as $key => $val):?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
<?php endforeach; ?>

            <!-- draw table output for demo -->
            <table>
                <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
                <tr><td colspan="2"><input class="btn btn-success m-5" type="submit" id="banksubmit" value="To the Bank" /></td></tr>
            </table>
        </form>

    </body>
</html>