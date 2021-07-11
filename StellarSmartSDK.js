class StellarSmartSDK {
    constructor(sPublicAddress, bIsTestnet) {
        this.sPublicAddress = sPublicAddress;
        this.bIsTestnet = bIsTestnet;
        if (bIsTestnet) {
            this.sTestnet_Horizon = "-testnet"
            this.objTestnet_NetworkPassphrase = StellarSdk.Networks.TESTNET
        } else {
            this.sTestnet_Horizon = ""
            this.objTestnet_NetworkPassphrase = StellarSdk.Networks.PUBLIC
        }
        this.objMessages = []
        this.nXLMUSD = 0
    }

    async SendMessage(sMessage) {
        var sMemoHex, sMemoText, sExtraDigits, nIndex1, nTemp, nLastSequenceDigitCount, sourceAccount, objCurrentAccount, objServer, objDocumentPair, objTransaction, nMemoPayment
        var arrExtraPayments = []
        if (sMessage.length < 33) {
            sMemoText = sMessage.padEnd(32, ' ')
            nMemoPayment = .0000001
        } else {
            sMemoText = sMessage.substr(0, 32)
            sExtraDigits = BigInt('0x' + StringToHex(sMessage.substr(32))).toString()

            for (nIndex1 = 0; nIndex1 < sExtraDigits.length; nIndex1 += 4) {
                nTemp = parseFloat((parseInt(sExtraDigits.substr(nIndex1, 4)) / 10000000).toFixed(7))
                if (nTemp == 0) {
                    nTemp = .001
                }
                arrExtraPayments.push(nTemp)
            }
            nLastSequenceDigitCount = sExtraDigits.length % 4;
            if (nLastSequenceDigitCount == 4) {
                nLastSequenceDigitCount = 4;
            }
            arrExtraPayments.push(parseFloat((nLastSequenceDigitCount / 10000000).toFixed(7)))
            nMemoPayment = arrExtraPayments[0]
        }
        sMemoHex = StringToHex(sMemoText)
////////////////////////////////////
// Create Stellar Transaction START
// Send from Act. #1 to Act #7
////////////////////////////////////
        objServer = new StellarSdk.Server("https://horizon" + this.sTestnet_Horizon + ".stellar.org");
        objDocumentPair = StellarSdk.Keypair.fromSecret("SBKRL3HTGTWJMENJD2WJOAIIOUIBTN55FDOD3J7LFMIVLQHIQDRFBIJY")

	    objCurrentAccount = await objServer.loadAccount(objDocumentPair.publicKey())
        sourceAccount = new StellarSdk.Account(objDocumentPair.publicKey(), objCurrentAccount.sequence)

        var objMemo = new StellarSdk.Memo(StellarSdk.MemoHash, sMemoHex)
	    objTransaction = new StellarSdk.TransactionBuilder(sourceAccount, {
    		fee: "100",
            networkPassphrase: this.objTestnet_NetworkPassphrase,
            memo: objMemo
        })
       
        objTransaction = objTransaction.addOperation(
			StellarSdk.Operation.payment({
            destination: this.sPublicAddress,
			asset: StellarSdk.Asset.native(),
            amount: nMemoPayment.toString(),
			}),
		)

        for (nIndex1 = 1; nIndex1 < arrExtraPayments.length; nIndex1++) {
            objTransaction = objTransaction.addOperation(
                StellarSdk.Operation.payment({
                    destination: this.sPublicAddress,
                    asset: StellarSdk.Asset.native(),
                    amount: arrExtraPayments[nIndex1].toString(),
                }),
            )

        }
        objTransaction = objTransaction.setTimeout(1000000)
        objTransaction = objTransaction.build();
        await objTransaction.sign(objDocumentPair);
        await objServer.submitTransaction(objTransaction)

////////////////////////////////////
// Create Stellar Transaction END
////////////////////////////////////


        console.log("SUCCESS: Transaction submitted OK.")
    }

    async GetMessages() {
        var cnRecordsPerSearch = 200
        var nRecordsFound = cnRecordsPerSearch
        var arrTransactionHashes_all = []
        var arrTransactionHashes_unique = []
        var objPaymentsForOneTransaction = []
        var arrMessages = []
        var sMessage, sEncodedDigits, objFetchResponse, objResult, nIndex1, nIndex2, sURL, sFinalMessage, sLastPayment_amount, nLastPayment_digits, sTemp

        // Get XLM_USD
        objFetchResponse = await fetch('https://api.pro.coinbase.com/products/XLM-USD/ticker');
        objResult = await objFetchResponse.json()
        this.nXLMUSD = parseFloat(objResult.price)

        sURL = "https://horizon" + this.sTestnet_Horizon + ".stellar.org/accounts/" + this.sPublicAddress + "/operations?limit=" + cnRecordsPerSearch + "&join=transactions"

        var objRetrievedPayments = []
        while (nRecordsFound == cnRecordsPerSearch) {
            //var objResult = JSON.parse(await makeRequest("GET", sURL));
            objFetchResponse = await fetch(sURL);
            objResult = await objFetchResponse.json()

            var aobjRecords = objResult._embedded.records
            for (var i = 0; i < aobjRecords.length; i++) {
                if (aobjRecords[i].transaction.memo_type == "hash" && aobjRecords[i].transaction_successful == true && aobjRecords[i].type == "payment" && aobjRecords[i].asset_type == "native" && aobjRecords[i].to == this.sPublicAddress) {

                    objRetrievedPayments.push({
                        "created_at": aobjRecords[i].created_at, "from": aobjRecords[i].from, "amount": aobjRecords[i].amount, "memo": atob(aobjRecords[i].transaction.memo), "transaction_hash": aobjRecords[i].transaction_hash,
                        "epoch": new Date(Date.parse(aobjRecords[i].created_at)).getTime() / 1000
                    })
                    arrTransactionHashes_all.push(aobjRecords[i].transaction_hash)
                }
            }
            nRecordsFound = objResult._embedded.records.length
            sURL = objResult._links.next.href
        }

        var arrTransactionHashes_unique = arrTransactionHashes_all.filter((v, i, a) => a.indexOf(v) === i);

        // Concatenate Payments assigned to each Transaction Hash
        for (nIndex1 = 0; nIndex1 < arrTransactionHashes_unique.length; nIndex1++) {
            objPaymentsForOneTransaction = objRetrievedPayments.filter(function (el) {
                return el.transaction_hash == arrTransactionHashes_unique[nIndex1]
            });
            if (objPaymentsForOneTransaction.length < 2) {
                sFinalMessage = objPaymentsForOneTransaction[0].memo.trim()
            } else {
                sEncodedDigits = ""
                for (nIndex2 = 0; nIndex2 < objPaymentsForOneTransaction.length - 2; nIndex2++) {
                    sTemp = Math.round(objPaymentsForOneTransaction[nIndex2].amount * 10000000).toString()
                    sEncodedDigits += sTemp.padStart(4, '0')
/*
                    // DEVTEST
                    if (nIndex1 == 4) {
                        console.log(arrTransactionHashes_unique[nIndex1])
                        console.log(objPaymentsForOneTransaction[nIndex2].amount)
                        console.log(sTemp)
                        console.log(sEncodedDigits)
                    }
*/
                }

                sLastPayment_amount = Math.round(objPaymentsForOneTransaction[objPaymentsForOneTransaction.length - 2].amount * 10000000).toString()
                nLastPayment_digits = Math.round(objPaymentsForOneTransaction[objPaymentsForOneTransaction.length - 1].amount * 10000000)
                sEncodedDigits += sLastPayment_amount.padStart(nLastPayment_digits, '0')
                sFinalMessage = objPaymentsForOneTransaction[0].memo + HexToString(dec2hex(sEncodedDigits))
            }
            this.objMessages.push({"created_at": objPaymentsForOneTransaction[0].created_at, "from": objPaymentsForOneTransaction[0].from,
                "message": sFinalMessage,
                "epoch": objPaymentsForOneTransaction[0].epoch
            })
        }
        this.objMessages.sort((a, b) => (a.epoch < b.epoch) ? 1 : ((b.epoch < a.epoch) ? -1 : 0))
    }
}

function GetRandomID() {
    var sRandomID = "";
    for (var nIndex = 0; nIndex < 6; nIndex++) {
        nRandom = Math.floor(Math.random() * 52) + 65;
        if (nRandom > 90) {
            nRandom += 6;
        }
        sRandomID += String.fromCharCode(nRandom)
    }
    return sRandomID
}

function dec2hex(str) {
    var dec = str.toString().split(''), sum = [], hex = [], i, s
    while (dec.length) {
        s = 1 * dec.shift()
        for (i = 0; s || i < sum.length; i++) {
            s += (sum[i] || 0) * 10
            sum[i] = s % 16
            s = (s - sum[i]) / 16
        }
    }
    while (sum.length) {
        hex.push(sum.pop().toString(16))
    }
    return hex.join('')
}

function StringToHex(sString) {
    return sString.split("")
        .map(c => c.charCodeAt(0).toString(16).padStart(2, "0"))
        .join("");
}

function HexToString(sEncodedHex) {
    return sEncodedHex.split(/(\w\w)/g)
        .filter(p => !!p)
        .map(c => String.fromCharCode(parseInt(c, 16)))
        .join("")
}
