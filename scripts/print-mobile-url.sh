#!/usr/bin/env bash

IP="$(ipconfig getifaddr en0 2>/dev/null || ipconfig getifaddr en1 2>/dev/null || true)"

if [ -z "$IP" ]; then
    IP="（PCのIPアドレス）"
fi

echo ""
echo "スマホからは localhost では開けません。同じ Wi-Fi で以下にアクセスしてください:"
echo ""
echo "  http://${IP}:8000"
echo "  http://${IP}:8000/#contact"
echo ""
