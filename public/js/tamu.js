// Animasi fade-in saat form muncul
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        var overlay = document.getElementById("formOverlay");
        if (overlay) overlay.classList.add("visible");
    }, 100);
});

// Animasi shadow saat scroll
window.addEventListener("scroll", function () {
    var overlay = document.getElementById("formOverlay");
    if (overlay) {
        if (window.scrollY > 10) {
            overlay.classList.add("scrolled");
        } else {
            overlay.classList.remove("scrolled");
        }
    }
});

// Responsive canvas
function resizeCanvas() {
    const canvas = document.getElementById("signature-pad");
    if (!canvas) return;
    const parent = canvas.parentElement;
    canvas.width = parent.offsetWidth;
    canvas.height = 200;
}
window.addEventListener("resize", resizeCanvas);
window.addEventListener("DOMContentLoaded", resizeCanvas);

// Signature pad logic
let canvas = document.getElementById("signature-pad");
if (canvas) {
    let ctx = canvas.getContext("2d");
    let drawing = false;

    function getPos(e) {
        let rect = canvas.getBoundingClientRect();
        if (e.touches) {
            return {
                x: e.touches[0].clientX - rect.left,
                y: e.touches[0].clientY - rect.top,
            };
        } else {
            return {
                x: e.offsetX,
                y: e.offsetY,
            };
        }
    }

    function draw(e) {
        if (!drawing) return;
        ctx.lineWidth = 2;
        ctx.lineCap = "round";
        ctx.strokeStyle = "#222";
        let pos = getPos(e);
        ctx.lineTo(pos.x, pos.y);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
    }

    canvas.addEventListener("mousedown", (e) => {
        drawing = true;
        let pos = getPos(e);
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
    });
    canvas.addEventListener("mousemove", draw);
    canvas.addEventListener("mouseup", () => {
        drawing = false;
        ctx.beginPath();
    });
    canvas.addEventListener("mouseleave", () => {
        drawing = false;
        ctx.beginPath();
    });

    // Touch events for mobile
    canvas.addEventListener("touchstart", (e) => {
        drawing = true;
        let pos = getPos(e);
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
    });
    canvas.addEventListener("touchmove", (e) => {
        draw(e);
        e.preventDefault();
    });
    canvas.addEventListener("touchend", () => {
        drawing = false;
        ctx.beginPath();
    });

    // Clear button
    var clearBtn = document.getElementById("clear-signature");
    if (clearBtn) {
        clearBtn.addEventListener("click", function () {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });
    }

    // On submit, save canvas as dataURL to hidden input
    var form = document.querySelector("form");
    if (form) {
        form.addEventListener("submit", function (e) {
            document.getElementById("signature").value =
                canvas.toDataURL("image/png");
        });
    }
}
