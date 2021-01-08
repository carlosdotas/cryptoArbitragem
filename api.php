<?php
include 'config.php';
include 'funcoes.php';

$_SERVER[percentualMaximo] = 15;
$_SERVER[percentualMinimo] = 1;

////////////////////////////////////////////////////////////////////////////////////
$moedas = monta_array(
	'okex',
	apiload('https://www.okex.com/api/spot/v3/instruments/ticker'),
	'instrument_id',
	'ask',
	'bid',
	'https://www.okex.com/spot/trade/{COIN1}-{COIN2}'
);
////////////////////////////////////////////////////////////////////////////////////
$moedas = monta_array(
	'huobi',
	apiload('https://api.huobi.pro/market/tickers')[data],
	'symbol',
	'ask',
	'bid',
	'https://www.huobi.com/en-us/exchange/{COIN1}_{COIN2}/'
);

////////////////////////////////////////////////////////////////////////////////////
$moedas = monta_array(
	'bitfinex',
	apiload('https://api-pub.bitfinex.com/v2/tickers?symbols=ALL'),
	'0',
	'1',
	'3',
	'https://global.bittrex.com/Market/Index?MarketName={COIN1}-{COIN2}'
);

////////////////////////////////////////////////////////////////////////////////////
$moedas = monta_array(
	'kucoin',
	apiload('https://api.kucoin.com/api/v1/market/allTickers')[data][ticker],
	'symbol',
	'sell',
	'buy',
	'https://trade.kucoin.com/{COIN1}-{COIN2}'
);
////////////////////////////////////////////////////////////////////////////////////
$moedas = monta_array(
	'binance',
	apiload('https://api1.binance.com/api/v3/ticker/24hr'),
	'symbol',
	'askPrice',
	'bidPrice',
	'https://www.binance.com/pt/trade/{COIN1}_{COIN2}?layout=basic'
);
////////////////////////////////////////////////////////////////////////////////////
$moedas = monta_array(
	'bittrex',
	apiload('https://api.bittrex.com/v3/markets/tickers'),
	'symbol',
	'askRate',
	'bidRate',
	'https://global.bittrex.com/Market/Index?MarketName={COIN2}-{COIN1}'
);
//$moedas = monta_array('probit', apiload('https://api.probit.com/api/exchange/v1/ticker')[data], market_id, high, low);
////////////////////////////////////////////////////////////////////////////////////
$moedas = monta_array(
	'hitbtc',
	apiload('https://api.hitbtc.com/api/2/public/ticker'),
	'symbol',
	'ask',
	'bid',
	'https://hitbtc.com/{coin1}-to-{coin2}'

);
////////////////////////////////////////////////////////////////////////////////////
$moedas = monta_array(
	'hotbit',
	apiload('https://api.hotbit.io/api/v1/allticker')[ticker],
	'symbol',
	'sell',
	'buy',
	'https://www.hotbit.io/exchange?symbol={COIN1}_{COIN2}'
);
////////////////////////////////////////////////////////////////////////////////////
$moedas = monta_array_key(
	'mxc',
	apiload('https://www.mxc.io/open/api/v1/data/ticker')[data],
	'symbol',
	'sell',
	'buy',
	'https://www.mxc.com/trade/easy#{COIN1}_{COIN2}'
);

//////Prepara Saida
foreach (arbitragem() as $key => $value) {
	$saida[rows][] = $value;
	$total[total] = $key;
}

echo json_encode($saida);
die;
