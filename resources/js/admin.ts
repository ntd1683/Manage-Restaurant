//region Lucide
import {
    createIcons, Search, Globe, Maximize, Settings, Bell, AlignJustify,
    LogOut, User, Dot, Moon, Sun, ChevronUp, MapPin, Newspaper, LayoutGrid,
    Settings2, ListOrdered, ChevronDown, Users, Hotel, ShoppingBag, Wallet,
    UserCog, Headphones, ChevronRight, HardDriveDownload, HardDriveUpload,
    CircleUser, Home, Eye, EyeOff, Plus, CalendarDays, ArrowDownUp, ArrowRight, ArrowLeft,
    ArrowUp, ArrowDown, BadgeCheck, BadgeX, BadgeAlert, XCircle
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
        Eye,
        EyeOff,
        Plus,
        CalendarDays,
        ArrowDownUp,
        ArrowRight,
        ArrowLeft,
        ArrowUp,
        ArrowDown,
        BadgeCheck,
        BadgeX,
        BadgeAlert,
        XCircle,
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
    // @ts-ignore
    if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else { // @ts-ignore
            if (document.documentElement.mozRequestFullScreen) {
                // @ts-ignore
                document.documentElement.mozRequestFullScreen();
            } else { // @ts-ignore
                if (document.documentElement.webkitRequestFullscreen) {
                    // @ts-ignore
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            }
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else { // @ts-ignore
            if (document.mozCancelFullScreen) {
                // @ts-ignore
                document.mozCancelFullScreen();
            } else { // @ts-ignore
                if (document.webkitCancelFullScreen) {
                    // @ts-ignore
                    document.webkitCancelFullScreen();
                }
            }
        }
    }
});
