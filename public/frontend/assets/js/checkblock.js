checkAdblock();

async function checkAdblock() {
    this.appendIframeAds();
    let isBlocked = await this.hasAdblockByIframe();
    if (!isBlocked) {
        isBlocked = await this.hasAdblockByScript();
    }

    if (isBlocked) {
        let html = `<div id="ad" class="maincontainer">
        <div class="bat">
        <img class="wing leftwing"
        src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png" >
        <img class="body"
        src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-body.png" alt="bat">
        <img class="wing rightwing"
        src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png" >
        </div>
        <div class="bat">
        <img class="wing leftwing"
        src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png" >
        <img class="body"
        src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-body.png" >
        <img class="wing rightwing"
        src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png" >
        </div>
        <div class="bat">
        <img class="wing leftwing"
        src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png">
        <img class="body"
        src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-body.png" >
        <img class="wing rightwing"
        src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png">
        </div>
        <img class="foregroundimg" src="https://www.blissfullemon.com/wp-content/uploads/2018/09/HauntedHouseForeground.png"  alt="haunted house">

        </div>
        <h6 class="errorcode">Adblock Detected!</h6><br><br>
        <div class="errortext">
        disable your adblock on this site or use different web browser</div>
        </div>
        `;
        // hide
        div.style.visibility = "hidden";
        // OR
        div.style.display = "none";

        document.getElementById("demo").innerHTML = html;
        // alert("Ad blocker is used.")
        // console.log("Ad blocker is used.")
    } else {
        let blade = document.getElementById("blade");

        // show
        blade.style.visibility = "visible";
        // OR
        blade.style.display = "block";
        // hide
        div.style.visibility = "hidden";
        // OR
        div.style.display = "none";
    }
}

async function hasAdblockByScript() {
    let status = false;
    let url = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";
    const config = {
        method: "HEAD",
        mode: "no-cors",
    };
    let request = new Request(url, config);
    try {
        let a = await fetch(request);

        status = false;
    } catch (error) {
        status = true;
        return status;
    }

    url = "https://adblockanalytics.com";
    request = new Request(url, config);
    try {
        await fetch(request);
        status = false;
    } catch (error) {
        status = true;
        return status;
    }

    url = "https://acceptable.a-ads.com/1953466";
    request = new Request(url, config);
    try {
        await fetch(request);
        status = false;
    } catch (error) {
        status = true;
        return status;
    }

    return status;
}

function hasAdblockByIframe() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            let status = false;
            const iframe = document.getElementById("ads-text-iframe");
            if (
                iframe.style.display == "none" ||
                iframe.style.display == "hidden" ||
                iframe.style.visibility == "hidden" ||
                iframe.offsetHeight == 0
            ) {
                status = true;
            }
            iframe.remove();
            resolve(status);
        }, 100);
    });
}

function appendIframeAds() {
    const iframe = document.createElement("iframe");
    iframe.height = "1px";
    iframe.width = "1px";
    iframe.id = "ads-text-iframe";
    iframe.src = "https://domain.com/ads.html";
    document.body.appendChild(iframe);
}
