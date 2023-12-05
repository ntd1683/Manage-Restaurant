//region Lucide
import {
    createIcons, Search, Globe, Maximize, Settings, Bell, AlignJustify,
    LogOut, User, Dot, Moon, Sun, ChevronUp, MapPin, Newspaper, LayoutGrid,
    Settings2, ListOrdered, ChevronDown, Users, Hotel, ShoppingBag, Wallet,
    UserCog, Headphones, ChevronRight, HardDriveDownload, HardDriveUpload,
    CircleUser, Home
} from "lucide";

createIcons({
    icons: {
        Search,
        Globe,
        Maximize,
        Settings,
        Bell,
        AlignJustify,
        LogOut,
        User,
        Dot,
        Moon,
        Sun,
        ChevronUp,
        MapPin,
        Newspaper,
        LayoutGrid,
        Settings2,
        ListOrdered,
        ChevronDown,
        Users,
        Hotel,
        ShoppingBag,
        Wallet,
        UserCog,
        Headphones,
        ChevronRight,
        HardDriveDownload,
        HardDriveUpload,
        CircleUser,
        Home,
    }
});
//endregion

//region simplebar
import 'simplebar'; // or "import SimpleBar from 'simplebar';" if you want to use it manually.
import 'simplebar/dist/simplebar.css';

// You will need a ResizeObserver polyfill for browsers that don't support it! (iOS Safari, Edge, ...)
import ResizeObserver from 'resize-observer-polyfill';

window.ResizeObserver = ResizeObserver;
//endregion

document.querySelector('[data-toggle="fullscreen"]')?.addEventListener("click", (e) => {
    e.preventDefault();
    document.body.classList.toggle("fullscreen-enable");
    if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
});
